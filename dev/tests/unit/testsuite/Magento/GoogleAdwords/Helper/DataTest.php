<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\GoogleAdwords\Helper;

class DataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_configMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_configNodeMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_scopeConfigMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_registryMock;

    /**
     * @var \Magento\GoogleAdwords\Helper\Data
     */
    protected $_helper;

    protected function setUp()
    {
        $this->_configMock = $this->getMock('Magento\Framework\App\Config\ScopeConfigInterface');
        $this->_scopeConfigMock = $this->getMock('Magento\Framework\App\Config\ScopeConfigInterface');
        $this->_registryMock = $this->getMock('Magento\Framework\Registry', [], [], '', false);

        $objectManager = new \Magento\TestFramework\Helper\ObjectManager($this);
        $context = $this->getMock('Magento\Framework\App\Helper\Context', [], [], '', false);
        $this->_helper = $objectManager->getObject(
            'Magento\GoogleAdwords\Helper\Data',
            [
                'config' => $this->_configMock,
                'scopeConfig' => $this->_scopeConfigMock,
                'registry' => $this->_registryMock,
                'context' => $context
            ]
        );
    }

    /**
     * @return array
     */
    public function dataProviderForTestIsActive()
    {
        return [
            [true, 1234, true],
            [true, 'conversionId', false],
            [true, '', false],
            [false, '', false]
        ];
    }

    /**
     * @param bool $isActive
     * @param string $returnConfigValue
     * @param bool $returnValue
     * @dataProvider dataProviderForTestIsActive
     */
    public function testIsGoogleAdwordsActive($isActive, $returnConfigValue, $returnValue)
    {
        $this->_scopeConfigMock->expects(
            $this->any()
        )->method(
            'isSetFlag'
        )->with(
            \Magento\GoogleAdwords\Helper\Data::XML_PATH_ACTIVE
        )->will(
            $this->returnValue($isActive)
        );
        $this->_scopeConfigMock->expects($this->any())->method('getValue')->with($this->isType('string'))->will(
            $this->returnCallback(
                function () use ($returnConfigValue) {
                    return $returnConfigValue;
                }
            )
        );

        $this->assertEquals($returnValue, $this->_helper->isGoogleAdwordsActive());
    }

    public function testGetLanguageCodes()
    {
        $languages = ['en', 'ru', 'uk'];
        $this->_configMock->expects(
            $this->once()
        )->method(
            'getValue'
        )->with(
            \Magento\GoogleAdwords\Helper\Data::XML_PATH_LANGUAGES,
            'default'
        )->will(
            $this->returnValue($languages)
        );
        $this->assertEquals($languages, $this->_helper->getLanguageCodes());
    }

    public function dataProviderForTestConvertLanguage()
    {
        return [
            ['some-language', 'some-language'],
            ['zh_TW', 'zh_Hant'],
            ['zh_CN', 'zh_Hans'],
            ['iw', 'he']
        ];
    }

    /**
     * @param string $language
     * @param string $returnLanguage
     * @dataProvider dataProviderForTestConvertLanguage
     */
    public function testConvertLanguageCodeToLocaleCode($language, $returnLanguage)
    {
        $convertArray = ['zh_TW' => 'zh_Hant', 'iw' => 'he', 'zh_CN' => 'zh_Hans'];
        $this->_configMock->expects(
            $this->once()
        )->method(
            'getValue'
        )->with(
            \Magento\GoogleAdwords\Helper\Data::XML_PATH_LANGUAGE_CONVERT,
            'default'
        )->will(
            $this->returnValue($convertArray)
        );
        $this->assertEquals($returnLanguage, $this->_helper->convertLanguageCodeToLocaleCode($language));
    }

    public function testGetConversionImgSrc()
    {
        $conversionId = 123;
        $label = 'LabEl';
        $imgSrc = sprintf(
            'https://www.googleadservices.com/pagead/conversion/%s/?label=%s&amp;guid=ON&amp;script=0',
            $conversionId,
            $label
        );
        $this->_configMock->expects(
            $this->once()
        )->method(
            'getValue'
        )->with(
            \Magento\GoogleAdwords\Helper\Data::XML_PATH_CONVERSION_IMG_SRC,
            'default'
        )->will(
            $this->returnValue($imgSrc)
        );
        $this->assertEquals($imgSrc, $this->_helper->getConversionImgSrc());
    }

    public function testGetConversionJsSrc()
    {
        $jsSrc = 'some-js-src';
        $this->_configMock->expects(
            $this->once()
        )->method(
            'getValue'
        )->with(
            \Magento\GoogleAdwords\Helper\Data::XML_PATH_CONVERSION_JS_SRC
        )->will(
            $this->returnValue($jsSrc)
        );
        $this->assertEquals($jsSrc, $this->_helper->getConversionJsSrc());
    }

    /**
     * @return array
     */
    public function dataProviderForTestStoreConfig()
    {
        return [
            ['getConversionId', \Magento\GoogleAdwords\Helper\Data::XML_PATH_CONVERSION_ID, 123],
            ['getConversionLanguage', \Magento\GoogleAdwords\Helper\Data::XML_PATH_CONVERSION_LANGUAGE, 'en'],
            ['getConversionFormat', \Magento\GoogleAdwords\Helper\Data::XML_PATH_CONVERSION_FORMAT, '2'],
            ['getConversionColor', \Magento\GoogleAdwords\Helper\Data::XML_PATH_CONVERSION_COLOR, 'ffffff'],
            ['getConversionLabel', \Magento\GoogleAdwords\Helper\Data::XML_PATH_CONVERSION_LABEL, 'Label'],
            ['getConversionValueType', \Magento\GoogleAdwords\Helper\Data::XML_PATH_CONVERSION_VALUE_TYPE, '1'],
            ['getConversionValueConstant', \Magento\GoogleAdwords\Helper\Data::XML_PATH_CONVERSION_VALUE, '0']
        ];
    }

    /**
     * @param string $method
     * @param string $xmlPath
     * @param string $returnValue
     * @dataProvider dataProviderForTestStoreConfig
     */
    public function testGetStoreConfigValue($method, $xmlPath, $returnValue)
    {
        $this->_scopeConfigMock->expects(
            $this->once()
        )->method(
            'getValue'
        )->with(
            $xmlPath
        )->will(
            $this->returnValue($returnValue)
        );

        $this->assertEquals($returnValue, $this->_helper->{$method}());
    }

    public function testGetConversionValueDynamic()
    {
        $returnValue = 4.1;
        $this->_scopeConfigMock->expects(
            $this->any()
        )->method(
            'getValue'
        )->with(
            \Magento\GoogleAdwords\Helper\Data::XML_PATH_CONVERSION_VALUE_TYPE
        )->will(
            $this->returnValue(\Magento\GoogleAdwords\Helper\Data::CONVERSION_VALUE_TYPE_DYNAMIC)
        );
        $this->_registryMock->expects(
            $this->once()
        )->method(
            'registry'
        )->with(
            \Magento\GoogleAdwords\Helper\Data::CONVERSION_VALUE_REGISTRY_NAME
        )->will(
            $this->returnValue($returnValue)
        );

        $this->assertEquals($returnValue, $this->_helper->getConversionValue());
    }

    /**
     * @return array
     */
    public function dataProviderForTestConversionValueConstant()
    {
        return [[1.4, 1.4], ['', \Magento\GoogleAdwords\Helper\Data::CONVERSION_VALUE_DEFAULT]];
    }

    /**
     * @param string $conversionValueConst
     * @param string $returnValue
     * @dataProvider dataProviderForTestConversionValueConstant
     */
    public function testGetConversionValueConstant($conversionValueConst, $returnValue)
    {
        $this->_scopeConfigMock->expects(
            $this->at(0)
        )->method(
            'getValue'
        )->with(
            \Magento\GoogleAdwords\Helper\Data::XML_PATH_CONVERSION_VALUE_TYPE
        )->will(
            $this->returnValue(\Magento\GoogleAdwords\Helper\Data::CONVERSION_VALUE_TYPE_CONSTANT)
        );
        $this->_registryMock->expects($this->never())->method('registry');
        $this->_scopeConfigMock->expects(
            $this->at(1)
        )->method(
            'getValue'
        )->with(
            \Magento\GoogleAdwords\Helper\Data::XML_PATH_CONVERSION_VALUE
        )->will(
            $this->returnValue($conversionValueConst)
        );

        $this->assertEquals($returnValue, $this->_helper->getConversionValue());
    }
}
