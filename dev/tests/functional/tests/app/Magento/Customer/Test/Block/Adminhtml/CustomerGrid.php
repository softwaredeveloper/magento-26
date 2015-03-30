<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Customer\Test\Block\Adminhtml;

use Magento\Backend\Test\Block\Widget\Grid as AbstractGrid;

/**
 * Class CustomerGrid
 * Backend customer grid
 *
 */
class CustomerGrid extends AbstractGrid
{
    /**
     * Selector for action option select
     *
     * @var string
     */
    protected $option = '[name="group"]';

    /**
     * Filters array mapping
     *
     * @var array
     */
    protected $filters = [
        'name' => [
            'selector' => '#customerGrid_filter_name',
        ],
        'email' => [
            'selector' => '#customerGrid_filter_email',
        ],
        'group' => [
            'selector' => '#customerGrid_filter_group',
            'input' => 'select',
        ],
    ];
}
