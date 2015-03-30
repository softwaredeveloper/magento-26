<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Backend\Controller\Adminhtml\System\Store;

class DeleteWebsitePost extends \Magento\Backend\Controller\Adminhtml\System\Store
{
    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $itemId = $this->getRequest()->getParam('item_id');
        $model = $this->_objectManager->create('Magento\Store\Model\Website');
        $model->load($itemId);

        /** @var \Magento\Backend\Model\View\Result\Redirect $redirectResult */
        $redirectResult = $this->resultRedirectFactory->create();

        if (!$model) {
            $this->messageManager->addError(__('Unable to proceed. Please, try again'));
            return $redirectResult->setPath('adminhtml/*/');
        }
        if (!$model->isCanDelete()) {
            $this->messageManager->addError(__('This website cannot be deleted.'));
            return $redirectResult->setPath('adminhtml/*/editWebsite', ['website_id' => $model->getId()]);
        }

        if (!$this->_backupDatabase()) {
            return $redirectResult->setPath('*/*/editWebsite', ['website_id' => $itemId]);
        }

        try {
            $model->delete();
            $this->messageManager->addSuccess(__('The website has been deleted.'));
            return $redirectResult->setPath('adminhtml/*/');
        } catch (\Magento\Framework\Model\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addException($e, __('Unable to delete website. Please, try again later.'));
        }
        return $redirectResult->setPath('*/*/editWebsite', ['website_id' => $itemId]);
    }
}
