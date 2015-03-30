<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Sales\Model\Resource;

class QuoteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Sales\Model\Resource\Quote
     */
    protected $_resourceModel;

    protected function setUp()
    {
        $this->_resourceModel = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            'Magento\Sales\Model\Resource\Quote'
        );
    }

    /**
     * @magentoDataFixture Magento/Sales/_files/order.php
     */
    public function testIsOrderIncrementIdUsedNumericIncrementId()
    {
        $this->assertTrue($this->_resourceModel->isOrderIncrementIdUsed('100000001'));
    }

    /**
     * @magentoDataFixture Magento/Sales/_files/order_alphanumeric_id.php
     */
    public function testIsOrderIncrementIdUsedAlphanumericIncrementId()
    {
        $this->assertTrue($this->_resourceModel->isOrderIncrementIdUsed('M00000001'));
    }
}
