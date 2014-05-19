<?php

namespace Notrix\BcMath;

/**
 * bcmath functions wrapper
 *
 * @author Vaidas Lažauskas <vaidas@notrix.lt>
 */
class BcMath
{
    /**
     * @var Number\PositiveNumber
     */
    protected $scale;

    /**
     * Class constructor
     *
     * @param Number\PositiveNumber|int $scale
     */
    public function __construct($scale = null)
    {
        $this->setScale($scale);
    }

    /**
     * Setter of Scale
     *
     * @param Number\PositiveNumber|int $scale
     *
     * @return static
     *
     * @throws Exception\NumberException
     */
    public function setScale($scale)
    {
        if (!$scale instanceof Number\PositiveNumber) {
            $scale = Number\PositiveNumber::create($scale);
        }
        $this->scale = $scale;

        return $this;
    }

    /**
     * Getter of Scale
     *
     * @return Number\PositiveNumber
     */
    public function getScale()
    {
        return $this->scale;
    }

    /**
     * Add two arbitrary precision numbers
     *
     * @param Number\Number|string $leftOperand
     * @param Number\Number|string $rightOperand
     *
     * @return string The sum of the two operands, as a string.
     */
    public function addition($leftOperand, $rightOperand)
    {
        if (!$leftOperand instanceof Number\NumberInterface) {
            $leftOperand = Number\Number::create($leftOperand);
        }
        if (!$rightOperand instanceof Number\NumberInterface) {
            $rightOperand = Number\Number::create($rightOperand);
        }

        return Command\Addition::process($leftOperand, $rightOperand, $this->getScale())->getValue();
    }

    /**
     * Subtract one arbitrary precision number from another
     *
     * @param Number\Number|string $leftOperand
     * @param Number\Number|string $rightOperand
     *
     * @return string The result of the subtraction, as a string.
     */
    public function subtraction($leftOperand, $rightOperand)
    {
        if (!$leftOperand instanceof Number\NumberInterface) {
            $leftOperand = Number\Number::create($leftOperand);
        }
        if (!$rightOperand instanceof Number\NumberInterface) {
            $rightOperand = Number\Number::create($rightOperand);
        }

        return Command\Subtraction::process($leftOperand, $rightOperand, $this->getScale())->getValue();
    }

    /**
     * Get modulus of an arbitrary precision number
     *
     * @param Number\Number|string $leftOperand
     * @param Number\Number|string $rightOperand
     *
     * @return string the modulus as a string, or null if modulus is 0.
     */
    public function division($leftOperand, $rightOperand)
    {
        if (!$leftOperand instanceof Number\NumberInterface) {
            $leftOperand = Number\Number::create($leftOperand);
        }
        if (!$rightOperand instanceof Number\NumberInterface) {
            $rightOperand = Number\Number::create($rightOperand);
        }

        return Command\Division::process($leftOperand, $rightOperand, $this->getScale())->getValue();
    }

    /**
     * Multiply two arbitrary precision number
     *
     * @param Number\Number|string $leftOperand
     * @param Number\Number|string $rightOperand
     *
     * @return string the result as a string.
     */
    public function multiplication($leftOperand, $rightOperand)
    {
        if (!$leftOperand instanceof Number\NumberInterface) {
            $leftOperand = Number\Number::create($leftOperand);
        }
        if (!$rightOperand instanceof Number\NumberInterface) {
            $rightOperand = Number\Number::create($rightOperand);
        }

        return Command\Multiplication::process($leftOperand, $rightOperand, $this->getScale())->getValue();
    }

    /**
     * Power two arbitrary precision number
     *
     * @param Number\Number|string $leftOperand
     * @param Number\Number|string $rightOperand
     *
     * @return string the result as a string.
     */
    public function power($leftOperand, $rightOperand)
    {
        if (!$leftOperand instanceof Number\NumberInterface) {
            $leftOperand = Number\Number::create($leftOperand);
        }
        if (!$rightOperand instanceof Number\NumberInterface) {
            $rightOperand = Number\Number::create($rightOperand);
        }

        return Command\Power::process($leftOperand, $rightOperand, $this->getScale())->getValue();
    }

    /**
     * Compare two arbitrary precision numbers
     *
     * @param Number\Number|string $leftOperand
     * @param Number\Number|string $rightOperand
     *
     * @return int
     *      0 if the two operands are equal,
     *      1 if the leftOperand is larger than the rightOperand,
     *     -1 otherwise.
     */
    public function comparison($leftOperand, $rightOperand)
    {
        if (!$leftOperand instanceof Number\NumberInterface) {
            $leftOperand = Number\Number::create($leftOperand);
        }
        if (!$rightOperand instanceof Number\NumberInterface) {
            $rightOperand = Number\Number::create($rightOperand);
        }

        return Command\Comparison::process($leftOperand, $rightOperand, $this->getScale())->getValue();
    }

    /**
     * Round arbitrary precision number
     *
     * @param Number\Number|string      $operand
     * @param Number\PositiveNumber|int $precision
     *
     * @return string the result as a string.
     */
    public function rounding($operand, $precision = 0)
    {
        if (!$operand instanceof Number\NumberInterface) {
            $operand = Number\Number::create($operand);
        }
        if (!$precision instanceof Number\NumberInterface) {
            $precision = Number\PositiveNumber::create($precision);
        }

        return Command\Rounding::process($operand, $precision)->getValue();
    }

    /**
     * Ceil arbitrary precision number
     *
     * @param Number\Number|string      $operand
     * @param Number\PositiveNumber|int $precision
     *
     * @return string the result as a string.
     */
    public function ceiling($operand, $precision = 0)
    {
        if (!$operand instanceof Number\NumberInterface) {
            $operand = Number\Number::create($operand);
        }
        if (!$precision instanceof Number\NumberInterface) {
            $precision = Number\PositiveNumber::create($precision);
        }

        return Command\Ceiling::process($operand, $precision, $this->getScale())->getValue();
    }

    /**
     * Floor arbitrary precision number
     *
     * @param Number\Number|string      $operand
     * @param Number\PositiveNumber|int $precision
     *
     * @return string the result as a string.
     */
    public function flooring($operand, $precision = 0)
    {
        if (!$operand instanceof Number\NumberInterface) {
            $operand = Number\Number::create($operand);
        }
        if (!$precision instanceof Number\NumberInterface) {
            $precision = Number\PositiveNumber::create($precision);
        }

        return Command\Flooring::process($operand, $precision)->getValue();
    }
}
