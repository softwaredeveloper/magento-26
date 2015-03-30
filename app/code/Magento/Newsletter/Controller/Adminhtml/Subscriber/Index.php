<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Newsletter\Controller\Adminhtml\Subscriber;

class Index extends \Magento\Newsletter\Controller\Adminhtml\Subscriber
{
    /**
     * Newsletter subscribers page
     *
     * @return void
     */
    public function execute()
    {
        if ($this->getRequest()->getParam('ajax')) {
            $this->_forward('grid');
            return;
        }

        $this->_view->loadLayout();

        $this->_setActiveMenu('Magento_Newsletter::newsletter_subscriber');
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Newsletter Subscribers'));

        $this->_addBreadcrumb(__('Newsletter'), __('Newsletter'));
        $this->_addBreadcrumb(__('Subscribers'), __('Subscribers'));

        $this->_view->renderLayout();
    }
}
