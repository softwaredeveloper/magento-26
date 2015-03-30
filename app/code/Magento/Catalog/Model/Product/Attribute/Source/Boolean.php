<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/**
 * Product attribute source model for enable/disable option
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 */
namespace Magento\Catalog\Model\Product\Attribute\Source;

class Boolean extends \Magento\Eav\Model\Entity\Attribute\Source\Boolean
{
    /**
     * Retrieve all attribute options
     *
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => __('Yes'), 'value' => 1],
                ['label' => __('No'), 'value' => 0],
                ['label' => __('Use config'), 'value' => 2],
            ];
        }
        return $this->_options;
    }
}
