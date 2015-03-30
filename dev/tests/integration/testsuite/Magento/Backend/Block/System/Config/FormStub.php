<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/**
 * Stub system config form block for integration test
 */
namespace Magento\Backend\Block\System\Config;

class FormStub extends \Magento\Backend\Block\System\Config\Form
{
    /**
     * @var array
     */
    protected $_configDataStub = [];

    /**
     * @var array
     */
    protected $_configRootStub = [];

    /**
     * Sets stub config data
     *
     * @param array $configData
     */
    public function setStubConfigData(array $configData = [])
    {
        $this->_configDataStub = $configData;
    }

    /**
     * Sets stub config root
     *
     * @param array $configRoot
     * @return void
     */
    public function setStubConfigRoot(array $configRoot = [])
    {
        $this->_configRootStub = $configRoot;
    }

    /**
     * Initialize properties of object required for test.
     *
     * @return \Magento\Backend\Block\System\Config\Form
     */
    protected function _initObjects()
    {
        parent::_initObjects();
        $this->_configData = $this->_configDataStub;
        if ($this->_configRootStub) {
            $this->_configRoot = $this->_configRootStub;
        }
        $this->_fieldRenderer = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            'Magento\Framework\View\LayoutInterface'
        )->createBlock(
            'Magento\Backend\Block\System\Config\Form\Field'
        );
    }
}
