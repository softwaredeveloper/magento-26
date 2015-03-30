<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/** @var $installer \Magento\Catalog\Model\Resource\Setup */
$installer = $this;

/**
 * Install grouped product link type
 */
$data = [
    'link_type_id' => \Magento\GroupedProduct\Model\Resource\Product\Link::LINK_TYPE_GROUPED,
    'code' => 'super',
];
$installer->getConnection()
    ->insertOnDuplicate($installer->getTable('catalog_product_link_type'), $data);

/**
 * Install grouped product link attributes
 */
$select = $installer->getConnection()
    ->select()
    ->from(
        ['c' => $installer->getTable('catalog_product_link_attribute')]
    )
    ->where(
        "c.link_type_id=?",
        \Magento\GroupedProduct\Model\Resource\Product\Link::LINK_TYPE_GROUPED
    );
$result = $installer->getConnection()->fetchAll($select);

if (!$result) {
    $data = [
        [
            'link_type_id' => \Magento\GroupedProduct\Model\Resource\Product\Link::LINK_TYPE_GROUPED,
            'product_link_attribute_code' => 'position',
            'data_type' => 'int',
        ],
        [
            'link_type_id' => \Magento\GroupedProduct\Model\Resource\Product\Link::LINK_TYPE_GROUPED,
            'product_link_attribute_code' => 'qty',
            'data_type' => 'decimal'
        ],
    ];

    $installer->getConnection()->insertMultiple($installer->getTable('catalog_product_link_attribute'), $data);
}

$field = 'country_of_manufacture';
$applyTo = explode(',', $installer->getAttribute(\Magento\Catalog\Model\Product::ENTITY, $field, 'apply_to'));
if (!in_array('grouped', $applyTo)) {
    $applyTo[] = 'grouped';
    $installer->updateAttribute(\Magento\Catalog\Model\Product::ENTITY, $field, 'apply_to', implode(',', $applyTo));
}
