<?php
namespace phpzeiro;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    /**
     * @before
     */
    public function setupSomeFixtures()
    {
        $this->calculator = new Calculator();
    }

    public function testsSumEmpty()
    {
        $this->assertEquals(0, $this->calculator->sum_str(''));
    }

    public function testsSumOne()
    {
        $this->assertEquals(3, $this->calculator->sum_str('3'));
    }

    public function testsSumTwo()
    {
        $this->assertEquals(7, $this->calculator->sum_str('3,4'));
    }

    public function testsSumMany()
    {
        $this->assertEquals(22, $this->calculator->sum_str('3,4,8,7'));
    }

    public function testsSumWithNewline()
    {
        $this->assertEquals(10, $this->calculator->sum_str("4\n2,4"));
    }

    // “//[delimiter]\n[numbers…]”
    public function testsSumWithDelimiter()
    {
        $this->assertEquals(17, $this->calculator->sum_str("//;\n3;5\n9"));
    }

    /**
     * @expectedException     Exception
     */
    public function testsSumReturnExceptionForNegative()
    {
        $this->calculator->sum_str("1,-2");
    }

    /**
     * @expectedException     Exception
     * @expectedExceptionMessage    negative not allowed -3,-5
     */
    public function testsSumReturnExceptionListingNegative()
    {
        $this->calculator->sum_str("7,-3,2,-5");
    }
}
