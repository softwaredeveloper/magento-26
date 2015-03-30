<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Framework\Config;

use Magento\Framework\App\Filesystem\DirectoryList;

class ThemeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\TestFramework\Helper\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \Magento\Framework\Filesystem | \PHPUnit_Framework_MockObject_MockObject
     */
    protected $filesystemMock;

    /**
     * @var \Magento\Framework\Filesystem\Directory\ReadInterface | \PHPUnit_Framework_MockObject_MockObject
     */
    protected $dirReadMock;

    public function setUp()
    {
        $this->objectManager = new \Magento\TestFramework\Helper\ObjectManager($this);
        $this->filesystemMock = $this->getMockBuilder('Magento\Framework\Filesystem')
            ->disableOriginalConstructor()
            ->getMock();
        $this->dirReadMock = $this->getMockBuilder('Magento\Framework\Filesystem\Directory\ReadInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $this->filesystemMock->expects($this->any())
            ->method('getDirectoryRead')
            ->with(DirectoryList::THEMES)
            ->willReturn($this->dirReadMock);
    }

    public function testGetSchemaFile()
    {
        /** @var \Magento\Framework\Config\Theme $config */
        $config = $this->objectManager->getObject(
            'Magento\Framework\Config\Theme'
        );
        $this->assertFileExists($config->getSchemaFile());
    }

    /**
     * @param string $themePath
     * @param array $expected
     * @dataProvider dataGetterDataProvider
     */
    public function testDataGetter($themePath, $expected)
    {
        $expected = reset($expected);
        /** @var \Magento\Framework\Config\Theme $config */
        $config = $this->objectManager->getObject(
            'Magento\Framework\Config\Theme',
            [
                'configContent' => file_get_contents(__DIR__ . '/_files/area/' . $themePath . '/theme.xml'),
                'composerContent' => file_get_contents(__DIR__ . '/_files/area/' . $themePath . '/composer.json'),
            ]
        );
        $this->assertSame($expected['version'], $config->getThemeVersion());
        $this->assertSame($expected['media'], $config->getMedia());
        $this->assertSame($expected['title'], $config->getThemeTitle());
        $this->assertSame($expected['parent'], $config->getParentTheme());
    }

    /**
     * @return array
     */
    public function dataGetterDataProvider()
    {
        return [
            [
                'default_default',
                [[
                    'version' => '0.1.0',
                    'media' => ['preview_image' => 'media/default_default.jpg'],
                    'title' => 'Default',
                    'parent' => null,
                ]], ],
            [
                'default_test',
                [[
                    'version' => '0.1.1',
                    'media' => ['preview_image' => ''],
                    'title' => 'Test',
                    'parent' => ['Magento', 'default_default'],
                ]]],
            [
                'default_test2',
                [[
                    'version' => '0.1.2',
                    'media' => ['preview_image' => ''],
                    'title' => 'Test2',
                    'parent' => ['Magento', 'default_test'],
                ]]],
            [
                'test_default',
                [[
                    'version' => '0.1.3',
                    'media' => ['preview_image' => 'media/test_default.jpg'],
                    'title' => 'Default',
                    'parent' => null,
                ]]],
            [
                'test_external_package_descendant',
                [[
                    'version' => '0.1.4',
                    'media' => ['preview_image' => ''],
                    'title' => 'Default',
                    'parent' => ['Magento', 'default_test2'],
                ]]],
        ];
    }
}
