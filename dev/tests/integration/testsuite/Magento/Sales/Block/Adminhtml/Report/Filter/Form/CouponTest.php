<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Sales\Block\Adminhtml\Report\Filter\Form;

/**
 * @magentoAppArea adminhtml
 */
class CouponTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Layout
     *
     * @var \Magento\Framework\View\LayoutInterface
     */
    protected $_layout;

    protected function setUp()
    {
        parent::setUp();
        $this->_layout = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->get('Magento\Framework\View\LayoutInterface');
    }

    /**
     * @covers \Magento\Sales\Block\Adminhtml\Report\Filter\Form\Coupon::_afterToHtml
     */
    public function testAfterToHtml()
    {
        /** @var $block \Magento\Sales\Block\Adminhtml\Report\Filter\Form\Coupon */
        $block = $this->_layout->createBlock('Magento\Sales\Block\Adminhtml\Report\Filter\Form\Coupon');
        $block->setFilterData(new \Magento\Framework\Object());
        $html = $block->toHtml();

        $expectedStrings = [
            'FormElementDependenceController',
            'sales_report_rules_list',
            'sales_report_price_rule_type',
        ];
        foreach ($expectedStrings as $expectedString) {
            $this->assertContains($expectedString, $html);
        }
    }
}
