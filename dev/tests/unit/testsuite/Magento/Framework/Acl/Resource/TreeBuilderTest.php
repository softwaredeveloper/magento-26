<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Framework\Acl\Resource;

class TreeBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Framework\Acl\Resource\TreeBuilder
     */
    protected $_model;

    /**
     * Path to fixture
     *
     * @var string
     */
    protected $_fixturePath;

    protected function setUp()
    {
        $this->_model = new \Magento\Framework\Acl\Resource\TreeBuilder();
        $this->_fixturePath = realpath(__DIR__ . '/../../') . '/_files/Acl/Resource/';
    }

    public function testBuild()
    {
        $resourceList = require $this->_fixturePath . 'resourceList.php';
        $actual = require $this->_fixturePath . 'result.php';
        $expected = $this->_model->build($resourceList);
        $this->assertEquals($actual, $expected);
    }
}
