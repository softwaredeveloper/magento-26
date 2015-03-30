<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Reports\Controller\Adminhtml\Report\Shopcart;

class Product extends \Magento\Reports\Controller\Adminhtml\Report\Shopcart
{
    /**
     * Products in carts action
     *
     * @return void
     */
    public function execute()
    {
        $this->_initAction()->_setActiveMenu(
            'Magento_Reports::report_shopcart_product'
        )->_addBreadcrumb(
            __('Products Report'),
            __('Products Report')
        )->_addContent(
            $this->_view->getLayout()->createBlock('Magento\Reports\Block\Adminhtml\Shopcart\Product')
        );
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Products in Carts'));
        $this->_view->renderLayout();
    }
}
