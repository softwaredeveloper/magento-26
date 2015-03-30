<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\GiftMessage\Test\Block\Adminhtml\Order;

use Magento\GiftMessage\Test\Fixture\GiftMessage;

/**
 * Class Create
 * Adminhtml GiftMessage order create block.
 */
class Create extends \Magento\Sales\Test\Block\Adminhtml\Order\Create
{
    /**
     * Sales order create items block.
     *
     * @var string
     */
    protected $itemsBlock = '#order-items_grid';

    /**
     * Fill order items gift messages.
     *
     * @param array $products
     * @param GiftMessage $giftMessage
     */
    public function fillGiftMessageForItems(array $products, GiftMessage $giftMessage)
    {
        // Click on rootElement to solve overlapping inner elements by header menu.
        $this->_rootElement->click();
        /** @var \Magento\GiftMessage\Test\Block\Adminhtml\Order\Create\Items $items */
        $items = $this->blockFactory->create(
            'Magento\GiftMessage\Test\Block\Adminhtml\Order\Create\Items',
            ['element' => $this->_rootElement->find($this->itemsBlock)]
        );
        foreach ($products as $key => $product) {
            $giftMessageItem = $giftMessage->getItems()[$key];
            $items->getItemProduct($product)->fillGiftMessageForm($giftMessageItem);
        }
    }
}
