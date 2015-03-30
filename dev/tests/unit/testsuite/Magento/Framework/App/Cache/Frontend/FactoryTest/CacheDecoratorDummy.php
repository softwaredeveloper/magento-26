<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/**
 * Dummy object to test creation of decorators for cache frontend
 */
namespace Magento\Framework\App\Cache\Frontend\FactoryTest;

class CacheDecoratorDummy extends \Magento\Framework\Cache\Frontend\Decorator\Bare
{
    /**
     * @var array
     */
    protected $_params;

    /**
     * @param \Magento\Framework\Cache\FrontendInterface $frontend
     * @param array $params
     */
    public function __construct(\Magento\Framework\Cache\FrontendInterface $frontend, array $params)
    {
        parent::__construct($frontend);
        $this->_params = $params;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->_params;
    }
}
