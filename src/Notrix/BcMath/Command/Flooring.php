<?php

namespace Notrix\BcMath\Command;

use Notrix\BcMath\Number;

/**
 * Flooring command
 *
 * @author Vaidas Lažauskas <vaidas@notrix.lt>
 */
class Flooring implements CommandInterface
{
    /**
     * Process flooring command
     *
     * @param Number\Number         $number
     * @param Number\PositiveNumber $scale
     *
     * @return Number\Number
     */
    public static function process(Number\Number $number, Number\PositiveNumber $scale)
    {
        $multiplier = Power::process(Number\Number::create(10), $scale, Number\PositiveNumber::create(0));

        $number = Multiplication::process($number, $multiplier, Number\PositiveNumber::create(0));
        $operand = (Comparison::process($number, Number\Number::create(0), Number\PositiveNumber::create($scale))->getValue() == 1) ?
            Addition::process($number, Number\PositiveNumber::create(0), Number\PositiveNumber::create(0)) :
            Subtraction::process($number, Number\PositiveNumber::create(1), Number\PositiveNumber::create(0));

        return Division::process($operand, $multiplier, $scale);
    }
}
