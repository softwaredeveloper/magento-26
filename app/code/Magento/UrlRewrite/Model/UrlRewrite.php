<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\UrlRewrite\Model;

/**
 * @method int getEntityId()
 * @method string getEntityType()
 * @method int getRedirectType()
 * @method int getStoreId()
 * @method int getIsAutogenerated()
 * @method string getTargetPath()
 * @method UrlRewrite setEntityId(int $value)
 * @method UrlRewrite setEntityType(string $value)
 * @method UrlRewrite setMetadata($value)
 * @method UrlRewrite setRequestPath($value)
 * @method UrlRewrite setTargetPath($value)
 * @method UrlRewrite setRedirectType($value)
 * @method UrlRewrite setStoreId($value)
 * @method UrlRewrite setDescription($value)
 */
class UrlRewrite extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize corresponding resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magento\UrlRewrite\Model\Resource\UrlRewrite');
        $this->_collectionName = 'Magento\UrlRewrite\Model\Resource\UrlRewriteCollection';
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        $metadata = $this->getData(\Magento\UrlRewrite\Service\V1\Data\UrlRewrite::METADATA);
        return !empty($metadata) ? unserialize($metadata) : [];
    }
}
