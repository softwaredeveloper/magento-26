<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

require __DIR__ . '/../../../Magento/Sales/_files/order.php';

/** @var \Magento\Sales\Model\Order $order */
$order = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create('Magento\Sales\Model\Order');
$order->loadByIncrementId('100000001')->setCouponCode('1234567890')->setCreatedAt('2014-10-25 10:10:10')->save();
