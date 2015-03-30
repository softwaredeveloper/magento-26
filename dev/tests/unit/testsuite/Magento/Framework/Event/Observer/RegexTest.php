<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Framework\Event\Observer;

/**
 * Class RegexTest
 */
class RegexTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Regex
     */
    protected $regex;

    protected function setUp()
    {
        $this->regex = new Regex();
    }

    protected function tearDown()
    {
        $this->regex = null;
    }

    /**
     * @dataProvider isValidForProvider
     * @param string $pattern
     * @param string $name
     * @param bool $expectedResult
     */
    public function testIsValidFor($pattern, $name, $expectedResult)
    {
        $this->regex->setEventRegex($pattern);
        $eventMock = $this->getMock('Magento\Framework\Event', [], [], '', false);
        $eventMock->expects($this->any())
            ->method('getName')
            ->will($this->returnValue($name));

        $this->assertEquals($expectedResult, $this->regex->isValidFor($eventMock));
    }

    public function isValidForProvider()
    {
        return [
            ['~_name$~', 'event_name', true],
            ['~_names$~', 'event_name', false]
        ];
    }
}
