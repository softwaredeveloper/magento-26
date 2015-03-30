<?php
/**
 * Application config file resolver
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Framework\App\Config;

use Magento\Framework\App\Filesystem\DirectoryList;

class FileResolver implements \Magento\Framework\Config\FileResolverInterface
{
    /**
     * Module configuration file reader
     *
     * @var \Magento\Framework\Module\Dir\Reader
     */
    protected $_moduleReader;

    /**
     * File iterator factory
     *
     * @var \Magento\Framework\Config\FileIteratorFactory
     */
    protected $iteratorFactory;

    /**
     * @param \Magento\Framework\Module\Dir\Reader $moduleReader
     * @param \Magento\Framework\Filesystem $filesystem
     * @param \Magento\Framework\Config\FileIteratorFactory $iteratorFactory
     */
    public function __construct(
        \Magento\Framework\Module\Dir\Reader $moduleReader,
        \Magento\Framework\Filesystem $filesystem,
        \Magento\Framework\Config\FileIteratorFactory $iteratorFactory
    ) {
        $this->iteratorFactory = $iteratorFactory;
        $this->filesystem = $filesystem;
        $this->_moduleReader = $moduleReader;
    }

    /**
     * {@inheritdoc}
     */
    public function get($filename, $scope)
    {
        switch ($scope) {
            case 'primary':
                $directory = $this->filesystem->getDirectoryRead(DirectoryList::CONFIG);
                $iterator = $this->iteratorFactory->create(
                    $directory,
                    $directory->search('{' . $filename . ',*/' . $filename . '}')
                );
                break;
            case 'global':
                $iterator = $this->_moduleReader->getConfigurationFiles($filename);
                break;
            default:
                $iterator = $this->_moduleReader->getConfigurationFiles($scope . '/' . $filename);
                break;
        }
        return $iterator;
    }
}
