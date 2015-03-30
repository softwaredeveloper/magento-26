<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Sales\Test\Block\Adminhtml\Order\View\Tab\Shipments;

/**
 * Class Grid
 * Shipments grid on order view page
 */
class Grid extends \Magento\Backend\Test\Block\Widget\Grid
{
    /**
     * Locator value for link in action column
     *
     * @var string
     */
    protected $editLink = '[data-column="real_shipment_id"]';

    /**
     * Locator for shipment ids
     *
     * @var string
     */
    protected $shipmentId = 'td[data-column="real_shipment_id"]';

    /**
     * Filters array mapping
     *
     * @var array
     */
    protected $filters = [
        'id' => [
            'selector' => 'input[name="real_shipment_id"]',
        ],
        'qty_from' => [
            'selector' => '[name="total_qty[from]"]',
        ],
        'qty_to' => [
            'selector' => '[name="total_qty[to]"]',
        ],
    ];

    /**
     * Get shipment ids
     *
     * @return array
     */
    public function getIds()
    {
        $result = [];
        $shipmentIds = $this->_rootElement->find($this->shipmentId)->getElements();
        foreach ($shipmentIds as $shipmentId) {
            $result[] = trim($shipmentId->getText());
        }

        return $result;
    }
}
