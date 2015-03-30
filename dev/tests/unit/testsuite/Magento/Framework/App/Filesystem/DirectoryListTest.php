<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Framework\App\Filesystem;

class DirectoryListTest extends \PHPUnit_Framework_TestCase
{
    public function testRoot()
    {
        $object = new DirectoryList('/root/dir');
        $this->assertEquals($object->getRoot(), $object->getPath(DirectoryList::ROOT));
    }

    public function testDirectoriesCustomization()
    {
        $config = [DirectoryList::APP => [DirectoryList::PATH => 'foo', DirectoryList::URL_PATH => 'bar']];
        $object = new DirectoryList('/root/dir', $config);
        $this->assertFileExists($object->getPath(DirectoryList::SYS_TMP));
        $this->assertEquals('/root/dir/foo', $object->getPath(DirectoryList::APP));
        $this->assertEquals('bar', $object->getUrlPath(DirectoryList::APP));
        $this->setExpectedException(
            '\Magento\Framework\Filesystem\FilesystemException',
            "Unknown directory type: 'unknown'"
        );
        $object->getPath('unknown');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unknown type: test
     */
    public function testUnknownDirectory()
    {
        new DirectoryList('/root/dir', ['test' => [DirectoryList::PATH => '/baz']]);
    }
}
