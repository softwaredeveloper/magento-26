<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Backend\Block;

/**
 * Backend abstract block
 */
class AbstractBlock extends \Magento\Framework\View\Element\AbstractBlock
{
    /**
     * @var \Magento\Framework\AuthorizationInterface
     */
    protected $_authorization;

    /**
     * @param \Magento\Backend\Block\Context $context
     * @param array $data
     */
    public function __construct(\Magento\Backend\Block\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->_authorization = $context->getAuthorization();
    }
}
