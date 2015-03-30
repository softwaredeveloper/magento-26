<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Test\Integrity\Modular;

use Magento\Framework\App\Filesystem\DirectoryList;

class ViewConfigFilesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $file
     * @dataProvider viewConfigFileDataProvider
     */
    public function testViewConfigFile($file)
    {
        $domConfig = new \Magento\Framework\Config\Dom($file);
        /** @var \Magento\Framework\Filesystem $filesystem */
        $filesystem = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            'Magento\Framework\Filesystem'
        );
        $result = $domConfig->validate(
            $filesystem->getDirectoryRead(DirectoryList::LIB_INTERNAL)
                ->getAbsolutePath('Magento/Framework/Config/etc/view.xsd'),
            $errors
        );
        $message = "Invalid XML-file: {$file}\n";
        foreach ($errors as $error) {
            $message .= "{$error->message} Line: {$error->line}\n";
        }
        $this->assertTrue($result, $message);
    }

    /**
     * @return array
     */
    public function viewConfigFileDataProvider()
    {
        $result = [];
        $files = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            'Magento\Framework\Module\Dir\Reader'
        )->getConfigurationFiles(
            'view.xml'
        );
        foreach ($files as $file) {
            $result[] = [$file];
        }
        return $result;
    }
}
