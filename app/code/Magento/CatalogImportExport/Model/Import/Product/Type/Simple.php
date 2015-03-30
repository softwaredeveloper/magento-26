<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\CatalogImportExport\Model\Import\Product\Type;

/**
 * Import entity simple product type
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Simple extends \Magento\CatalogImportExport\Model\Import\Product\Type\AbstractType
{
    /**
     * Attributes' codes which will be allowed anyway, independently from its visibility property.
     *
     * @var string[]
     */
    protected $_forcedAttributesCodes = [
        'related_tgtr_position_behavior',
        'related_tgtr_position_limit',
        'upsell_tgtr_position_behavior',
        'upsell_tgtr_position_limit',
    ];
}
