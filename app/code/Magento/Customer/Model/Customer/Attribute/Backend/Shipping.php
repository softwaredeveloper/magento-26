<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Customer\Model\Customer\Attribute\Backend;

/**
 * Customer default shipping address backend
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Shipping extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    /**
     * @param \Magento\Framework\Object $object
     * @return void
     */
    public function beforeSave($object)
    {
        $defaultShipping = $object->getDefaultShipping();
        if (is_null($defaultShipping)) {
            $object->unsetDefaultShipping();
        }
    }

    /**
     * @param \Magento\Framework\Object $object
     * @return void
     */
    public function afterSave($object)
    {
        if ($defaultShipping = $object->getDefaultShipping()) {
            $addressId = false;
            /**
             * post_index set in customer save action for address
             * this is $_POST array index for address
             */
            foreach ($object->getAddresses() as $address) {
                if ($address->getPostIndex() == $defaultShipping) {
                    $addressId = $address->getId();
                }
            }

            if ($addressId) {
                $object->setDefaultShipping($addressId);
                $this->getAttribute()->getEntity()->saveAttribute($object, $this->getAttribute()->getAttributeCode());
            }
        }
    }
}
