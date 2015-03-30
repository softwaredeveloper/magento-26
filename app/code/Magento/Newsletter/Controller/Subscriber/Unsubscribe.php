<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Newsletter\Controller\Subscriber;

class Unsubscribe extends \Magento\Newsletter\Controller\Subscriber
{
    /**
     * Unsubscribe newsletter
     * @return void
     */
    public function execute()
    {
        $id = (int)$this->getRequest()->getParam('id');
        $code = (string)$this->getRequest()->getParam('code');

        if ($id && $code) {
            try {
                $this->_subscriberFactory->create()->load($id)->setCheckCode($code)->unsubscribe();
                $this->messageManager->addSuccess(__('You have been unsubscribed.'));
            } catch (\Magento\Framework\Model\Exception $e) {
                $this->messageManager->addException($e, $e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong with the un-subscription.'));
            }
        }
        $this->getResponse()->setRedirect($this->_redirect->getRedirectUrl());
    }
}
