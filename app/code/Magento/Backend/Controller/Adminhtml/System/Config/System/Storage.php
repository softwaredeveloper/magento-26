<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/**
 * Adminhtml account controller
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Magento\Backend\Controller\Adminhtml\System\Config\System;

class Storage extends \Magento\Backend\App\Action
{
    /**
     * Return file storage singleton
     *
     * @return \Magento\Core\Model\File\Storage
     */
    protected function _getSyncSingleton()
    {
        return $this->_objectManager->get('Magento\Core\Model\File\Storage');
    }

    /**
     * Return synchronize process status flag
     *
     * @return \Magento\Core\Model\File\Storage\Flag
     */
    protected function _getSyncFlag()
    {
        return $this->_getSyncSingleton()->getSyncFlag();
    }
}
