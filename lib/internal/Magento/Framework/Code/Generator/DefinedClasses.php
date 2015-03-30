<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Framework\Code\Generator;

use Magento\Framework\Autoload\AutoloaderRegistry;

/**
 * DefinedClasses class detects if a class has been defined
 */
class DefinedClasses
{
    /**
     * Determine if a class can be loaded without using the Code\Generator\Autoloader.
     *
     * @param string $className
     * @return bool
     */
    public function classLoadable($className)
    {
        if ($this->isAlreadyDefined($className)) {
            return true;
        }
        return $this->performAutoload($className);
    }

    /**
     * Checks whether class is already defined
     *
     * @param string $className
     * @return bool
     */
    protected function isAlreadyDefined($className)
    {
        return class_exists($className, false) || interface_exists($className, false);
    }

    /**
     * Performs autoload for given class name
     *
     * @param string $className
     * @return bool
     */
    protected function performAutoload($className)
    {
        try {
            return AutoloaderRegistry::getAutoloader()->loadClass($className);
        } catch (\Exception $e) {
            // Couldn't get access to the autoloader so we need to allow class_exists to call autoloader chain
            return (class_exists($className) || interface_exists($className));
        }
    }
}
