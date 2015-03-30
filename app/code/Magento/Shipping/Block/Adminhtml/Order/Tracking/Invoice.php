<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/**
 * Shipment tracking control form
 *
 */
namespace Magento\Shipping\Block\Adminhtml\Order\Tracking;

class Invoice extends \Magento\Shipping\Block\Adminhtml\Order\Tracking
{
    /**
     * Retrieve shipment model instance
     *
     * @return \Magento\Sales\Model\Order\Shipment
     */
    public function getInvoice()
    {
        return $this->_coreRegistry->registry('current_invoice');
    }

    /**
     * Retrieve
     *
     * @return unknown
     */
    protected function _getCarriersInstances()
    {
        return $this->_shippingConfig->getAllCarriers($this->getInvoice()->getStoreId());
    }
}
