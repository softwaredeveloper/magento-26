<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\UrlRewrite\Controller\Adminhtml\Url\Rewrite;

class Delete extends \Magento\UrlRewrite\Controller\Adminhtml\Url\Rewrite
{
    /**
     * URL rewrite delete action
     *
     * @return void
     */
    public function execute()
    {
        if ($this->_getUrlRewrite()->getId()) {
            try {
                $this->_getUrlRewrite()->delete();
                $this->messageManager->addSuccess(__('The URL Rewrite has been deleted.'));
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('An error occurred while deleting URL Rewrite.'));
                $this->_redirect('adminhtml/*/edit/', ['id' => $this->_getUrlRewrite()->getId()]);
                return;
            }
        }
        $this->_redirect('adminhtml/*/');
    }
}
