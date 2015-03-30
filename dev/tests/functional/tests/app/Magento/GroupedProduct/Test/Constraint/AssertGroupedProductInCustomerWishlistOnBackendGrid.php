<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\GroupedProduct\Test\Constraint;

use Magento\GroupedProduct\Test\Fixture\GroupedProductInjectable;
use Magento\Wishlist\Test\Constraint\AssertProductInCustomerWishlistOnBackendGrid;
use Mtf\Fixture\FixtureInterface;

/**
 * Class AssertGroupedProductInCustomerWishlistOnBackendGrid
 * Assert that grouped product is present in grid on customer's wish list tab with configure option and qty
 */
class AssertGroupedProductInCustomerWishlistOnBackendGrid extends AssertProductInCustomerWishlistOnBackendGrid
{
    /**
     * Prepare filter
     *
     * @param FixtureInterface $product
     * @return array
     */
    protected function prepareFilter(FixtureInterface $product)
    {
        $options = $this->prepareOptions($product);

        return ['product_name' => $product->getName(), 'qty_from' => 1, 'qty_to' => 1, 'options' => $options];
    }

    /**
     * Prepare options
     *
     * @param FixtureInterface $product
     * @return array
     */
    protected function prepareOptions(FixtureInterface $product)
    {
        /** @var GroupedProductInjectable $product */
        $productOptions = [];
        $checkoutData = $product->getCheckoutData()['options'];
        if (count($checkoutData)) {
            $associated = $product->getAssociated();
            foreach ($checkoutData as $optionData) {
                $productKey = str_replace('product_key_', '', $optionData['name']);
                $productOptions[] = [
                    'option_name' => $associated['assigned_products'][$productKey]['name'],
                    'value' => $optionData['qty'],
                ];
            }
        }

        return $productOptions;
    }
}
