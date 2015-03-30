<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Sales\Controller\AbstractController;

use Magento\Framework\App\Action;

abstract class View extends Action\Action
{
    /**
     * @var \Magento\Sales\Controller\AbstractController\OrderLoaderInterface
     */
    protected $orderLoader;

    /**
     * @param Action\Context $context
     * @param OrderLoaderInterface $orderLoader
     */
    public function __construct(Action\Context $context, OrderLoaderInterface $orderLoader)
    {
        $this->orderLoader = $orderLoader;
        parent::__construct($context);
    }

    /**
     * Order view page
     *
     * @return void
     */
    public function execute()
    {
        if (!$this->orderLoader->load($this->_request, $this->_response)) {
            return;
        }

        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();

        $navigationBlock = $this->_view->getLayout()->getBlock('customer_account_navigation');
        if ($navigationBlock) {
            $navigationBlock->setActive('sales/order/history');
        }
        $this->_view->renderLayout();
    }
}
