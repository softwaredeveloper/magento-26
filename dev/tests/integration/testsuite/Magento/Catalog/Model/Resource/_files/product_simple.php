<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
use Magento\Customer\Model\Group;

/** @var $product \Magento\Catalog\Model\Product */
$product = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
    ->create('Magento\Catalog\Model\Product');
$product->isObjectNew(true);
$product->setTypeId(\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE)
    ->setId(2)
    ->setAttributeSetId(4)
    ->setWebsiteIds([1])
    ->setName('Simple Products')
    ->setSku('simple products')
    ->setPrice(10)
    ->setWeight(1)
    ->setShortDescription("Short description")
    ->setTaxClassId(0)
    ->setTierPrice(
        [
            [
                'website_id' => 0,
                'cust_group' => Group::NOT_LOGGED_IN_ID,
                'price_qty'  => 2,
                'price'      => 8,
            ],
            [
                'website_id' => 0,
                'cust_group' => Group::CUST_GROUP_ALL,
                'price_qty'  => 21,
                'price'      => 81,
            ],
        ]
    )
    ->setDescription('Description with <b>html tag</b>')
    ->setMetaTitle('meta title')
    ->setMetaKeyword('meta keyword')
    ->setMetaDescription('meta description')
    ->setVisibility(\Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH)
    ->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED)
    ->setUrlKey('url-key')
    ->setUrlPath('url-key.html')
    ->save();
