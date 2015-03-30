<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

return [
    // Totals declared in Magento_Sales
    'nominal' => ['before' => ['subtotal'], 'after' => []],
    'subtotal' => ['after' => ['nominal'], 'before' => ['grand_total']],
    'shipping' => [
        'after' => ['subtotal', 'freeshipping', 'tax_subtotal'],
        'before' => ['grand_total'],
    ],
    'grand_total' => ['after' => ['subtotal'], 'before' => []],
    'msrp' => ['after' => [], 'before' => []],
    // Totals declared in Magento_SalesRule
    'freeshipping' => ['after' => ['subtotal'], 'before' => ['tax_subtotal', 'shipping']],
    'discount' => ['after' => ['subtotal', 'shipping'], 'before' => ['grand_total']],
    // Totals declared in Magento_Tax
    'tax_subtotal' => ['after' => ['freeshipping'], 'before' => ['tax', 'discount']],
    'tax_shipping' => ['after' => ['shipping'], 'before' => ['tax', 'discount']],
    'tax' => ['after' => ['subtotal', 'shipping'], 'before' => ['grand_total']],
    // Totals declared in Magento_Weee
    'weee' => ['after' => ['subtotal', 'tax', 'discount', 'grand_total', 'shipping'], 'before' => []]
];
