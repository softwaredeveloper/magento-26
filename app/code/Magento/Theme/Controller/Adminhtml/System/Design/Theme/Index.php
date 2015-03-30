<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Theme\Controller\Adminhtml\System\Design\Theme;

class Index extends \Magento\Theme\Controller\Adminhtml\System\Design\Theme
{
    /**
     * Index action
     *
     * @return void
     */
    public function execute()
    {
        $this->_eventManager->dispatch('theme_registration_from_filesystem');
        $this->_view->loadLayout();
        $this->_setActiveMenu('Magento_Theme::system_design_theme');
        $this->_view->renderLayout();
    }
}
