<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Framework\View\Design\FileResolution\Fallback;

use Magento\Framework\View\Design\Fallback\RulePool;

class FileTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $resolver;

    /**
     * @var File
     */
    protected $object;

    protected function setUp()
    {
        $this->resolver = $this->getMock('Magento\Framework\View\Design\FileResolution\Fallback\ResolverInterface');
        $this->object = new File($this->resolver);
    }

    public function testGetFile()
    {
        $theme = $this->getMockForAbstractClass('\Magento\Framework\View\Design\ThemeInterface');
        $expected = 'some/file.ext';
        $this->resolver->expects($this->once())
            ->method('resolve')
            ->with(RulePool::TYPE_FILE, 'file.ext', 'frontend', $theme, null, 'Magento_Module')
            ->will($this->returnValue($expected));
        $actual = $this->object->getFile('frontend', $theme, 'file.ext', 'Magento_Module');
        $this->assertSame($expected, $actual);
    }
}
