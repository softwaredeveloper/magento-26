<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\ConfigurableProduct\Model;

class OptionTypesListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OptionTypesList
     */
    protected $model;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $sourceMock;

    protected function setUp()
    {
        $this->sourceMock = $this->getMock('\Magento\Catalog\Model\System\Config\Source\Inputtype', [], [], '', false);
        $this->model = new OptionTypesList($this->sourceMock);
    }

    public function testGetItems()
    {
        $data = [
            ['value' => 'multiselect', 'label' => __('Multiple Select')],
            ['value' => 'select', 'label' => __('Dropdown')]
        ];
        $this->sourceMock->expects($this->once())->method('toOptionArray')->willReturn($data);
        $expected = ['multiselect', 'select'];
        $this->assertEquals($expected, $this->model->getItems());
    }
}
