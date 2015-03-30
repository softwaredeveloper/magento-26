<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Sales\Block\Adminhtml\Order\Create;

/**
 * Adminhtml sales order create sidebar
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Sidebar extends \Magento\Sales\Block\Adminhtml\Order\Create\AbstractCreate
{
    /**
     * Preparing global layout
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        if ($this->getCustomerId()) {
            $button = $this->getLayout()->createBlock(
                'Magento\Backend\Block\Widget\Button'
            )->setData(
                [
                    'label' => __('Update Changes'),
                    'onclick' => 'order.sidebarApplyChanges()',
                    'before_html' => '<div class="actions">',
                    'after_html' => '</div>',
                ]
            );
            $this->setChild('top_button', $button);
        }

        if ($this->getCustomerId()) {
            $button = clone $button;
            $button->unsId();
            $this->setChild('bottom_button', $button);
        }
        return parent::_prepareLayout();
    }

    /**
     * Check if can display
     *
     * @param \Magento\Framework\Object $child
     * @return true
     */
    public function canDisplay($child)
    {
        if (method_exists($child, 'canDisplay') && is_callable([$child, 'canDisplay'])) {
            return $child->canDisplay();
        }
        return true;
    }
}
