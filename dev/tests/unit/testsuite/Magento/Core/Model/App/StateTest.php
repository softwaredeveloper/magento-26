<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Core\Model\App;

use Magento\Framework\App\State;

class StateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $mode
     * @dataProvider constructorDataProvider
     */
    public function testConstructor($mode)
    {
        $model = new \Magento\Framework\App\State(
            $this->getMockForAbstractClass('Magento\Framework\Config\ScopeInterface', [], '', false),
            $mode
        );
        $this->assertEquals($mode, $model->getMode());
    }

    /**
     * @return array
     */
    public static function constructorDataProvider()
    {
        return [
            'default mode' => [\Magento\Framework\App\State::MODE_DEFAULT],
            'production mode' => [\Magento\Framework\App\State::MODE_PRODUCTION],
            'developer mode' => [\Magento\Framework\App\State::MODE_DEVELOPER]
        ];
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Unknown application mode: unknown mode
     */
    public function testConstructorException()
    {
        new \Magento\Framework\App\State(
            $this->getMockForAbstractClass('Magento\Framework\Config\ScopeInterface', [], '', false),
            "unknown mode"
        );
    }
}
