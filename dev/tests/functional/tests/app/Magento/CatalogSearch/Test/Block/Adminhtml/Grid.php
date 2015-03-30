<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\CatalogSearch\Test\Block\Adminhtml;

use Magento\Backend\Test\Block\Widget\Grid as WidgetGrid;

/**
 * Class Grid
 * Backend search terms grid
 */
class Grid extends WidgetGrid
{
    /**
     * Initialize block elements
     *
     * @var array
     */
    protected $filters = [
        'search_query' => [
            'selector' => 'input[name="search_query"]',
        ],
        'store_id' => [
            'selector' => 'select[name="store_id"]',
            'input' => 'selectstore',
        ],
        'results_from' => [
            'selector' => 'input[name="num_results[from]"]',
        ],
        'popularity_from' => [
            'selector' => 'input[name="popularity[from]"]',
        ],
        'synonym_for' => [
            'selector' => 'input[name="synonym_for"]',
        ],
        'redirect' => [
            'selector' => 'input[name="redirect"]',
        ],
        'display_in_terms' => [
            'selector' => 'select[name="display_in_terms"]',
            'input' => 'select',
        ],
    ];
}
