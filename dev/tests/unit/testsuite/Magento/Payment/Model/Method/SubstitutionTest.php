<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Payment\Model\Method;

class SubstitutionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\TestFramework\Helper\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \Magento\Payment\Model\Method\Substitution
     */
    protected $model;

    public function setUp()
    {
        $this->objectManager = new \Magento\TestFramework\Helper\ObjectManager($this);
        $this->model = $this->objectManager->getObject('Magento\Payment\Model\Method\Substitution');
    }

    public function testGetTitle()
    {
        $infoMock = $this->getMockBuilder(
            'Magento\Payment\Model\Info'
        )->disableOriginalConstructor()->setMethods(
            []
        )->getMock();

        $this->model->setInfoInstance($infoMock);
        $expectedResult = 'StringTitle';
        $infoMock->expects(
            $this->once()
        )->method(
            'getAdditionalInformation'
        )->with(
            \Magento\Payment\Model\Method\Substitution::INFO_KEY_TITLE
        )->will(
            $this->returnValue(
                $expectedResult
            )
        );

        $this->assertEquals($expectedResult, $this->model->getTitle());
    }
}
