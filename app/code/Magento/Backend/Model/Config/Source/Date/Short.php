<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Backend\Model\Config\Source\Date;

class Short implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        $arr = [];
        $arr[] = ['label' => '', 'value' => ''];
        $arr[] = ['label' => strftime('MM/DD/YY (%m/%d/%y)'), 'value' => '%m/%d/%y'];
        $arr[] = ['label' => strftime('MM/DD/YYYY (%m/%d/%Y)'), 'value' => '%m/%d/%Y'];
        $arr[] = ['label' => strftime('DD/MM/YY (%d/%m/%y)'), 'value' => '%d/%m/%y'];
        $arr[] = ['label' => strftime('DD/MM/YYYY (%d/%m/%Y)'), 'value' => '%d/%m/%Y'];
        return $arr;
    }
}
