<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/**
 * Item Data Builder
 */
namespace Magento\Catalog\Model\Layer\Filter\Item;

class DataBuilder
{
    /**
     * Array of items data
     * array(
     *      $index => array(
     *          'label' => $label,
     *          'value' => $value,
     *          'count' => $count
     *      )
     * )
     *
     * @return array
     */
    protected $_itemsData = [];

    /**
     * Add Item Data
     *
     * @param string $label
     * @param string $label
     * @param int $count
     * @return void
     */
    public function addItemData($label, $value, $count)
    {
        $this->_itemsData[] = [
            'label' => $label,
            'value' => $value,
            'count' => $count,
        ];
    }

    /**
     * Get Items Data
     *
     * @return array
     */
    public function build()
    {
        $result = $this->_itemsData;
        $this->_itemsData = [];
        return $result;
    }
}
