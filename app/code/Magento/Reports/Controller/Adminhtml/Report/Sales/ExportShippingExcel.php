<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Reports\Controller\Adminhtml\Report\Sales;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

class ExportShippingExcel extends \Magento\Reports\Controller\Adminhtml\Report\Sales
{
    /**
     * Export shipping report grid to Excel XML format
     *
     * @return ResponseInterface
     */
    public function execute()
    {
        $fileName = 'shipping.xml';
        $grid = $this->_view->getLayout()->createBlock('Magento\Reports\Block\Adminhtml\Sales\Shipping\Grid');
        $this->_initReportAction($grid);
        return $this->_fileFactory->create($fileName, $grid->getExcelFile($fileName), DirectoryList::VAR_DIR);
    }
}
