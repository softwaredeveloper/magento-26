<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Framework\Api;

/**
 * Builder for Filter Service Data Object.
 *
 * @method Filter create()
 */
class FilterBuilder extends \Magento\Framework\Api\Builder
{
    /**
     * Set field
     *
     * @param string $field
     * @return $this
     */
    public function setField($field)
    {
        $this->data['field'] = $field;
        return $this;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->data['value'] = $value;
        return $this;
    }

    /**
     * Set condition type
     *
     * @param string $conditionType
     * @return $this
     */
    public function setConditionType($conditionType)
    {
        $this->data['condition_type'] = $conditionType;
        return $this;
    }
}
