<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Catalog\Model\Product\Option;

/**
 * @codeCoverageIgnore
 */
class Type extends \Magento\Framework\Model\AbstractExtensibleModel implements
    \Magento\Catalog\Api\Data\ProductCustomOptionTypeInterface
{
    /**
     * Get option type label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->getData('label');
    }

    /**
     * Get option type code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getData('code');
    }

    /**
     * Get option type group
     *
     * @return string
     */
    public function getGroup()
    {
        return $this->getData('group');
    }
}
