<?php
/**
 * Validator constraint delegates validation of value's property to wrapped validator.
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Framework\Validator\Constraint;

class Property extends \Magento\Framework\Validator\Constraint
{
    /**
     * Property name
     *
     * @var string
     */
    protected $_property;

    /**
     * Constructor
     *
     * @param \Magento\Framework\Validator\ValidatorInterface $validator
     * @param string $property
     * @param string $alias
     */
    public function __construct(\Magento\Framework\Validator\ValidatorInterface $validator, $property, $alias = null)
    {
        parent::__construct($validator, $alias);
        $this->_property = $property;
    }

    /**
     * Get value that should be validated. Tries to extract value's property if \Magento\Framework\Object or \ArrayAccess or array
     * is passed
     *
     * @param mixed $value
     * @return mixed
     */
    protected function _getValidatorValue($value)
    {
        $result = null;

        if ($value instanceof \Magento\Framework\Object) {
            $result = $value->getDataUsingMethod($this->_property);
        } elseif ((is_array($value) || $value instanceof \ArrayAccess) && isset($value[$this->_property])) {
            $result = $value[$this->_property];
        }

        return $result;
    }

    /**
     * Add messages with code of property name
     *
     * @param array $messages
     * @return void
     */
    protected function _addMessages(array $messages)
    {
        $this->_messages[$this->_property] = $messages;
    }
}
