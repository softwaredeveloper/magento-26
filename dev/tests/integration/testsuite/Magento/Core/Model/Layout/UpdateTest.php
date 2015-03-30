<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Core\Model\Layout;

class UpdateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Core\Model\Layout\Update
     */
    protected $_model;

    protected function setUp()
    {
        $this->_model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            'Magento\Core\Model\Layout\Update'
        );
    }

    public function testConstructor()
    {
        $this->_model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            'Magento\Core\Model\Layout\Update'
        );
        $this->assertInstanceOf('Magento\Core\Model\Resource\Layout\Update', $this->_model->getResource());
    }

    /**
     * @magentoDbIsolation enabled
     */
    public function testCrud()
    {
        $this->_model->setData(['handle' => 'default', 'xml' => '<layout/>', 'sort_order' => 123]);
        $entityHelper = new \Magento\TestFramework\Entity(
            $this->_model,
            ['handle' => 'custom', 'xml' => '<layout version="0.1.0"/>', 'sort_order' => 456]
        );
        $entityHelper->testCrud();
    }
}
