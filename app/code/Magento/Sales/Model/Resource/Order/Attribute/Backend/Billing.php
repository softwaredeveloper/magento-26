<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Sales\Model\Resource\Order\Attribute\Backend;

/**
 * Order billing address backend
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Billing extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    /**
     * Perform operation before save
     *
     * @param \Magento\Framework\Object $object
     * @return void
     */
    public function beforeSave($object)
    {
        $billingAddressId = $object->getBillingAddressId();
        if (is_null($billingAddressId)) {
            $object->unsetBillingAddressId();
        }
    }

    /**
     * Perform operation after save
     *
     * @param \Magento\Framework\Object $object
     * @return void
     */
    public function afterSave($object)
    {
        $billingAddressId = false;
        foreach ($object->getAddressesCollection() as $address) {
            if ('billing' == $address->getAddressType()) {
                $billingAddressId = $address->getId();
            }
        }
        if ($billingAddressId) {
            $object->setBillingAddressId($billingAddressId);
            $this->getAttribute()->getEntity()->saveAttribute($object, $this->getAttribute()->getAttributeCode());
        }
    }
}
