<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Catalog\Model\Resource\Product\Attribute\Backend;

use Magento\Catalog\Model\Resource\Product\Attribute\Backend\Groupprice\AbstractGroupprice;

/**
 * Catalog product group price backend attribute model
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Groupprice extends AbstractGroupprice
{
    /**
     * Initialize connection and define main table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('catalog_product_entity_group_price', 'value_id');
    }
}
