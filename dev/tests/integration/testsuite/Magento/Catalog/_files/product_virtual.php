<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/** @var $product \Magento\Catalog\Model\Product */
$product = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create('Magento\Catalog\Model\Product');
$product->setTypeId(\Magento\Catalog\Model\Product\Type::TYPE_VIRTUAL)
    ->setId(21)
    ->setAttributeSetId(4)
    ->setWebsiteIds([1])
    ->setName('Virtual Product')
    ->setSku('virtual-product')
    ->setPrice(10)
    ->setTaxClassId(0)
    ->setVisibility(\Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH)
    ->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED)
    ->save();
