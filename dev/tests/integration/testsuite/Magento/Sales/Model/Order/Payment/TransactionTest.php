<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Sales\Model\Order\Payment;

/**
 * Tests transaction model:
 *
 * @see \Magento\Sales\Model\Order\Payment\Transaction
 * @magentoDataFixture Magento/Sales/_files/transactions.php
 */
class TransactionTest extends \PHPUnit_Framework_TestCase
{
    public function testLoadByTxnId()
    {
        $order = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create('Magento\Sales\Model\Order');
        $order->loadByIncrementId('100000001');

        $model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            'Magento\Sales\Model\Order\Payment\Transaction'
        );
        $model->setOrderPaymentObject($order->getPayment())->loadByTxnId('invalid_transaction_id');

        $this->assertNull($model->getId());

        $model->loadByTxnId('trx1');
        $this->assertNotNull($model->getId());
    }
}
