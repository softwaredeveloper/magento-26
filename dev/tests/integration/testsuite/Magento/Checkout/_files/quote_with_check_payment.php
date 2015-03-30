<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

require 'quote_with_address.php';
/** @var \Magento\Sales\Model\Quote $quote */

/** @var $rate \Magento\Sales\Model\Quote\Address\Rate */
$rate = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create('Magento\Sales\Model\Quote\Address\Rate');
$rate->setCode('freeshipping_freeshipping');
$rate->getPrice(1);

$quote->getShippingAddress()->setShippingMethod('freeshipping_freeshipping');
$quote->getShippingAddress()->addShippingRate($rate);
$quote->getPayment()->setMethod('checkmo');

$quote->collectTotals();
$quote->save();

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
$quoteService = $objectManager->create('Magento\Sales\Model\Service\Quote', ['quote' => $quote]);
$quoteService->getQuote()->getPayment()->setMethod('checkmo');
