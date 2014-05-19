<?php

namespace Notrix\BcMath;

/**
 * BcMath class tests
 *
 * @author Vaidas Lažauskas <vaidas@notrix.lt>
 */
class BcMathTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BcMath
     */
    protected $bcMath;

    /**
     * Set up
     */
    public function setUp()
    {
        $this->bcMath = new BcMath(
            Number\PositiveNumber::create(6)
        );
    }

    /**
     * Test addition
     *
     * @param Number\Number $leftOperand
     * @param Number\Number $rightOperand
     * @param Number\Number $result
     *
     * @dataProvider additionProvider
     */
    public function testAddition(Number\Number $leftOperand, Number\Number $rightOperand, Number\Number $result)
    {
        $this->assertEquals(
            $result->getValue(),
            $this->bcMath->addition($leftOperand, $rightOperand)
        );
    }

    /**
     * Test subtraction
     *
     * @param Number\Number $leftOperand
     * @param Number\Number $rightOperand
     * @param Number\Number $result
     *
     * @dataProvider subtractionProvider
     */
    public function testSubtraction(Number\Number $leftOperand, Number\Number $rightOperand, Number\Number $result)
    {
        $this->assertEquals(
            $result->getValue(),
            $this->bcMath->subtraction($leftOperand, $rightOperand)
        );
    }

    /**
     * Test multiplication
     *
     * @param Number\Number $leftOperand
     * @param Number\Number $rightOperand
     * @param Number\Number $result
     *
     * @dataProvider multiplicationProvider
     */
    public function testMultiplication($leftOperand, $rightOperand, $result)
    {
        $this->assertEquals(
            $result->getValue(),
            $this->bcMath->multiplication($leftOperand, $rightOperand)
        );
    }

    /**
     * Test power
     *
     * @param Number\Number $leftOperand
     * @param Number\Number $rightOperand
     * @param Number\Number $result
     *
     * @dataProvider powerProvider
     */
    public function testPower($leftOperand, $rightOperand, $result)
    {
        $this->assertEquals(
            $result->getValue(),
            $this->bcMath->power($leftOperand, $rightOperand)
        );
    }

    /**
     * Test division
     *
     * @param Number\Number $leftOperand
     * @param Number\Number $rightOperand
     * @param Number\Number $result
     *
     * @dataProvider divisionProvider
     */
    public function testDivision(Number\Number $leftOperand, Number\Number $rightOperand, Number\Number $result)
    {
        $this->assertEquals(
            $result->getValue(),
            $this->bcMath->division($leftOperand, $rightOperand)
        );
    }

    /**
     * Test ceiling
     *
     * @param Number\Number $operand
     * @param Number\Number $precision
     * @param Number\Number $result
     *
     * @dataProvider ceilingProvider
     */
    public function testCeil($operand, $precision, $result)
    {
        $this->assertEquals(
            $result->getValue(),
            $this->bcMath->ceiling($operand, $precision)
        );
    }

    /**
     * Test floor
     *
     * @param Number\Number $operand
     * @param Number\Number $precision
     * @param Number\Number $result
     *
     * @dataProvider flooringProvider
     */
    public function testFloor($operand, $precision, $result)
    {
        $this->assertEquals(
            $result->getValue(),
            $this->bcMath->flooring($operand, $precision)
        );
    }

    /**
     * Test rounding
     *
     * @param Number\Number $operand
     * @param Number\Number $precision
     * @param Number\Number $result
     *
     * @dataProvider roundingProvider
     */
    public function testRound($operand, $precision, $result)
    {
        $this->assertEquals(
            $result->getValue(),
            $this->bcMath->rounding($operand, $precision)
        );
    }

    /**
     * Addition provider
     *
     * @return array
     */
    public function additionProvider()
    {
        return array(
            array(Number\Number::create('0.5'),  Number\Number::create('0.5'),  Number\Number::create('1')),
            array(Number\Number::create('1'),    Number\Number::create('1'),    Number\Number::create('2')),
            array(Number\Number::create('1'),    Number\Number::create('-1'),   Number\Number::create('0')),
            array(Number\Number::create('-0'),   Number\Number::create('0'),    Number\Number::create('0')),
            array(Number\Number::create('0'),    Number\Number::create('-0'),   Number\Number::create('0')),
            array(Number\Number::create('-0.5'), Number\Number::create('0'),    Number\Number::create('-0.5')),
            array(Number\Number::create('-0.5'), Number\Number::create('-0.5'), Number\Number::create('-1')),
            array(Number\Number::create('-1'),   Number\Number::create('1'),    Number\Number::create('0')),
            array(Number\Number::create('-1'),   Number\Number::create('-1'),   Number\Number::create('-2')),
        );
    }

    /**
     * Subtraction provider
     *
     * @return array
     */
    public function subtractionProvider()
    {
        return array(
            array(Number\Number::create('1'),    Number\Number::create('1'),    Number\Number::create('0')),
            array(Number\Number::create('-1'),   Number\Number::create('-1'),   Number\Number::create('0')),
            array(Number\Number::create('1'),    Number\Number::create('-1'),   Number\Number::create('2')),
            array(Number\Number::create('-1'),   Number\Number::create('1'),    Number\Number::create('-2')),
            array(Number\Number::create('0.5'),  Number\Number::create('0.5'),  Number\Number::create('0')),
            array(Number\Number::create('-0.5'), Number\Number::create('-0.5'), Number\Number::create('0')),
            array(Number\Number::create('-0.5'), Number\Number::create('0'),    Number\Number::create('-0.5')),
            array(Number\Number::create('-0'),   Number\Number::create('0'),    Number\Number::create('0')),
        );
    }

    /**
     * Multiplication provider
     *
     * @return array
     */
    public function multiplicationProvider()
    {
        return array(
            array(Number\Number::create('5.654789'), Number\Number::create('1.55'), Number\Number::create('8.764922')),
            array(Number\Number::create('3.123456'), Number\Number::create('1.77'), Number\Number::create('5.528517')),
            array(Number\Number::create('1'),        Number\Number::create('1'),    Number\Number::create('1')),
            array(Number\Number::create('1'),        Number\Number::create('-1'),   Number\Number::create('-1')),
            array(Number\Number::create('0.5'),      Number\Number::create('0.5'),  Number\Number::create('0.25')),
            array(Number\Number::create('-0'),       Number\Number::create('0'),    Number\Number::create('0')),
            array(Number\Number::create('-0.5'),     Number\Number::create('0'),    Number\Number::create('0')),
            array(Number\Number::create('-0.5'),     Number\Number::create('-0.5'), Number\Number::create('0.25')),
            array(Number\Number::create('-1'),       Number\Number::create('1'),    Number\Number::create('-1')),
            array(Number\Number::create('-1'),       Number\Number::create('-1'),   Number\Number::create('1')),
        );
    }

    /**
     * Power provider
     *
     * @return array
     */
    public function powerProvider()
    {
        return array(
            array(Number\Number::create('5'), Number\Number::create('2'), Number\Number::create('25')),
            array(Number\Number::create('2'), Number\Number::create('3'), Number\Number::create('8')),
            array(Number\Number::create('-1'), Number\Number::create('2'), Number\Number::create('1')),
            array(Number\Number::create('-1'), Number\Number::create('3'), Number\Number::create('-1')),
            array(Number\Number::create('0.5'), Number\Number::create('3'), Number\Number::create('0.125')),
            array(Number\Number::create('10'), Number\Number::create('5'), Number\Number::create('100000')),
            array(Number\Number::create('3'), Number\Number::create('1'), Number\Number::create('3')),
        );
    }

    /**
     * Division provider
     *
     * @return array
     */
    public function divisionProvider()
    {
        return array(
            array(Number\Number::create('700'),  Number\Number::create('3.5'),  Number\Number::create('200')),
            array(Number\Number::create('1'),    Number\Number::create('3'),    Number\Number::create('0.333333')),
            array(Number\Number::create('1'),    Number\Number::create('2'),    Number\Number::create('0.5')),
            array(Number\Number::create('1'),    Number\Number::create('1'),    Number\Number::create('1')),
            array(Number\Number::create('1'),    Number\Number::create('-1'),   Number\Number::create('-1')),
            array(Number\Number::create('0.5'),  Number\Number::create('0.5'),  Number\Number::create('1')),
            array(Number\Number::create('-0.5'), Number\Number::create('-0.5'), Number\Number::create('1')),
            array(Number\Number::create('-1'),   Number\Number::create('1'),    Number\Number::create('-1')),
            array(Number\Number::create('-1'),   Number\Number::create('-1'),   Number\Number::create('1')),
        );
    }

    /**
     * Ceiling provider
     *
     * @return array
     */
    public function ceilingProvider()
    {
        return array(
            array(Number\Number::create('10.5481'),   Number\PositiveNumber::create(3), Number\Number::create('10.549')),
            array(Number\Number::create('35'),        Number\PositiveNumber::create(2), Number\Number::create('35')),
            array(Number\Number::create('-10.548'),   Number\PositiveNumber::create(2), Number\Number::create('-10.54')),
            array(Number\Number::create('8.444444'),  Number\PositiveNumber::create(0), Number\Number::create('9')),
            array(Number\Number::create('3.999999'),  Number\PositiveNumber::create(0), Number\Number::create('4')),
            array(Number\Number::create('26.0000'),   Number\PositiveNumber::create(0), Number\Number::create('26')),
            array(Number\Number::create('12.0001'),   Number\PositiveNumber::create(0), Number\Number::create('13')),
            array(Number\Number::create('1.000001'),  Number\PositiveNumber::create(0), Number\Number::create('2')),
            array(Number\Number::create('5.0000001'), Number\PositiveNumber::create(0), Number\Number::create('5')),
        );
    }

    /**
     * Floor provider
     *
     * @return array
     */
    public function flooringProvider()
    {
        return array(
            array(Number\Number::create('10.5489'),    Number\PositiveNumber::create(3), Number\Number::create('10.548')),
            array(Number\Number::create('35'),         Number\PositiveNumber::create(2), Number\Number::create('35')),
            array(Number\Number::create('-10.548'),    Number\PositiveNumber::create(2), Number\Number::create('-10.55')),
            array(Number\Number::create('9.333333'),   Number\PositiveNumber::create(0), Number\Number::create('9')),
            array(Number\Number::create('7.999999'),   Number\PositiveNumber::create(0), Number\Number::create('7')),
            array(Number\Number::create('8.0000'),     Number\PositiveNumber::create(0), Number\Number::create('8')),
            array(Number\Number::create('3.0009'),     Number\PositiveNumber::create(0), Number\Number::create('3')),
            array(Number\Number::create('12.000009'),  Number\PositiveNumber::create(0), Number\Number::create('12')),
            array(Number\Number::create('99.0000001'), Number\PositiveNumber::create(0), Number\Number::create('99')),
        );
    }

    /**
     * Rounding provider
     *
     * @return array
     */
    public function roundingProvider()
    {
        return array(
            array(Number\Number::create('10.544'),       Number\PositiveNumber::create(2), Number\Number::create('10.54')),
            array(Number\Number::create('-10.544'),      Number\PositiveNumber::create(2), Number\Number::create('-10.54')),
            array(Number\Number::create('10.545'),       Number\PositiveNumber::create(2), Number\Number::create('10.55')),
            array(Number\Number::create('10.444444'),    Number\PositiveNumber::create(0), Number\Number::create('10')),
            array(Number\Number::create('10.488888'),    Number\PositiveNumber::create(0), Number\Number::create('10')),
            array(Number\Number::create('10.588888'),    Number\PositiveNumber::create(0), Number\Number::create('11')),
            array(Number\Number::create('10.000000'),    Number\PositiveNumber::create(6), Number\Number::create('10.000000')),
            array(Number\Number::create('10.0000555'),   Number\PositiveNumber::create(6), Number\Number::create('10.000056')),
            array(Number\Number::create('10.000055565'), Number\PositiveNumber::create(8), Number\Number::create('10.00005557')),
        );
    }
}
