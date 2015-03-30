<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Reports\Controller\Adminhtml\Report\Review;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

class ExportProductExcel extends \Magento\Reports\Controller\Adminhtml\Report\Review
{
    /**
     * Export review product report to Excel XML format
     *
     * @return ResponseInterface
     */
    public function execute()
    {
        $this->_view->loadLayout(false);
        $fileName = 'review_product.xml';
        $exportBlock = $this->_view->getLayout()->getChildBlock(
            'adminhtml.block.report.review.product.grid',
            'grid.export'
        );
        return $this->_fileFactory->create($fileName, $exportBlock->getExcelFile(), DirectoryList::VAR_DIR);
    }
}
