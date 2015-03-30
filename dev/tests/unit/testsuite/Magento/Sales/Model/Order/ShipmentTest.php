<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Sales\Model\Order;

class ShipmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Sales\Model\Order\shipment
     */
    protected $shipmentModel;

    protected function setUp()
    {
        $helperManager = new \Magento\TestFramework\Helper\ObjectManager($this);
        $arguments = [];
        $this->shipmentModel = $helperManager->getObject('Magento\Sales\Model\Order\shipment', $arguments);
    }

    public function testGetIncrementId()
    {
        $this->shipmentModel->setIncrementId('test_increment_id');
        $this->assertEquals('test_increment_id', $this->shipmentModel->getIncrementId());
    }
}
