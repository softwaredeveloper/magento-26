<?php
/**
 * Downloadable Link Info Builder
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Downloadable\Service\V1\DownloadableLink\Data;

use Magento\Framework\Api\ExtensibleObjectBuilder;

/**
 * @codeCoverageIgnore
 */
class DownloadableLinkInfoBuilder extends ExtensibleObjectBuilder
{
    /**
     * @param int|null $value
     * @return $this
     */
    public function setId($value)
    {
        return $this->_set(DownloadableLinkInfo::ID, $value);
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTitle($value)
    {
        return $this->_set(DownloadableLinkInfo::TITLE, $value);
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setSortOrder($value)
    {
        return $this->_set(DownloadableLinkInfo::SORT_ORDER, $value);
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setShareable($value)
    {
        return $this->_set(DownloadableLinkInfo::SHAREABLE, $value);
    }

    /**
     * Link price
     *
     * @param float|null $value
     * @return $this
     */
    public function setPrice($value = 0.0)
    {
        return $this->_set(DownloadableLinkInfo::PRICE, $value);
    }

    /**
     * Number of downloads per user
     *
     * @param int|null $value
     * @return $this
     */
    public function setNumberOfDownloads($value = null)
    {
        return $this->_set(DownloadableLinkInfo::NUMBER_OF_DOWNLOADS, $value);
    }

    /**
     * Sample data object
     *
     * @param \Magento\Downloadable\Service\V1\DownloadableLink\Data\DownloadableResourceInfo|null $value
     * @return $this
     */
    public function setSampleResource($value = null)
    {
        return $this->_set(DownloadableLinkInfo::SAMPLE_RESOURCE, $value);
    }

    /**
     * Link data object
     *
     * @param \Magento\Downloadable\Service\V1\DownloadableLink\Data\DownloadableResourceInfo $value
     * @return $this
     */
    public function setLinkResource($value)
    {
        return $this->_set(DownloadableLinkInfo::LINK_RESOURCE, $value);
    }
}
