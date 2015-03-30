<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Catalog\Model\Product\Attribute\Backend;

class CategoryTest extends \PHPUnit_Framework_TestCase
{
    public function testAfterLoad()
    {
        $categoryIds = [1, 2, 3, 4, 5];

        $product = $this->getMock('Magento\Framework\Object', ['getCategoryIds', 'setData']);
        $product->expects($this->once())->method('getCategoryIds')->will($this->returnValue($categoryIds));

        $product->expects($this->once())->method('setData')->with('category_ids', $categoryIds);

        $categoryAttribute = $this->getMock('Magento\Framework\Object', ['getAttributeCode']);
        $categoryAttribute->expects(
            $this->once()
        )->method(
            'getAttributeCode'
        )->will(
            $this->returnValue('category_ids')
        );

        $model = new \Magento\Catalog\Model\Product\Attribute\Backend\Category();
        $model->setAttribute($categoryAttribute);

        $model->afterLoad($product);
    }
}
