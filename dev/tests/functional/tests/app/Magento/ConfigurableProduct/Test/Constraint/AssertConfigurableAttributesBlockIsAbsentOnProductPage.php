<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\ConfigurableProduct\Test\Constraint;

use Magento\Catalog\Test\Page\Product\CatalogProductView;
use Magento\ConfigurableProduct\Test\Fixture\ConfigurableProductInjectable;
use Mtf\Client\Browser;
use Mtf\Constraint\AbstractConstraint;

/**
 * Assert that all configurable attributes is absent on product page on frontend.
 */
class AssertConfigurableAttributesBlockIsAbsentOnProductPage extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Assert that all configurable attributes is absent on product page on frontend.
     *
     * @param Browser $browser
     * @param CatalogProductView $catalogProductView
     * @param ConfigurableProductInjectable $product
     * @return void
     */
    public function processAssert(
        Browser $browser,
        CatalogProductView $catalogProductView,
        ConfigurableProductInjectable $product
    ) {
        $browser->open($_ENV['app_frontend_url'] . $product->getUrlKey() . '.html');
        \PHPUnit_Framework_Assert::assertFalse(
            $catalogProductView->getConfigurableAttributesBlock()->isVisible(),
            "Configurable attributes are present on product page on frontend."
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return "All configurable attributes are absent on product page on frontend.";
    }
}
