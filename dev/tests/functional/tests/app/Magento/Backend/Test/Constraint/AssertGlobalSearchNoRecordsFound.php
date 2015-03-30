<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Backend\Test\Constraint;

use Magento\Backend\Test\Page\Adminhtml\Dashboard;
use Mtf\Constraint\AbstractConstraint;

/**
 * Class AssertGlobalSearchNoRecordsFound
 * Assert that search result contains expected text
 */
class AssertGlobalSearchNoRecordsFound extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Expected search result text
     */
    const EXPECTED_RESULT = 'No records found.';

    /**
     * Assert that search result contains expected text
     *
     * @param Dashboard $dashboard
     * @return void
     */
    public function processAssert(Dashboard $dashboard)
    {
        $isVisibleInResult = $dashboard->getAdminPanelHeader()->isSearchResultVisible(self::EXPECTED_RESULT);
        \PHPUnit_Framework_Assert::assertTrue(
            $isVisibleInResult,
            'Expected text ' . self::EXPECTED_RESULT . ' is absent in search results'
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return '"No records found." is present in search results';
    }
}
