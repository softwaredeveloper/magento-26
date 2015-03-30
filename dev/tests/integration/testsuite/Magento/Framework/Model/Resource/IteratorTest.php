<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Framework\Model\Resource;

class IteratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Framework\Model\Resource\Iterator
     */
    protected $_model;

    /**
     * Counter for testing walk() callback
     *
     * @var int
     */
    protected $_callbackCounter = 0;

    protected function setUp()
    {
        $this->_model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            'Magento\Framework\Model\Resource\Iterator'
        );
    }

    public function testWalk()
    {
        $collection = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            'Magento\Store\Model\Resource\Store\Collection'
        );
        $this->_model->walk($collection->getSelect(), [[$this, 'walkCallback']]);
        $this->assertGreaterThan(0, $this->_callbackCounter);
    }

    /**
     * Helper callback for testWalk()
     *
     * @param array $data
     * @return bool
     */
    public function walkCallback($data)
    {
        $this->_callbackCounter = $data['idx'];
        return true;
    }

    /**
     * @expectedException \Magento\Framework\Model\Exception
     */
    public function testWalkException()
    {
        $this->_model->walk('test', [[$this, 'walkCallback']]);
    }
}
