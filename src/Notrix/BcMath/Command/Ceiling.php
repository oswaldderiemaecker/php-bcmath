<?php

namespace Notrix\BcMath\Command;

use Notrix\BcMath\Number;

/**
 * Ceiling command
 *
 * @author Vaidas Lažauskas <vaidas@notrix.lt>
 */
class Ceiling implements CommandInterface
{
    /**
     * Process ceiling command
     *
     * @param Number\Number         $number
     * @param Number\PositiveNumber $precision
     * @param Number\PositiveNumber $scale
     *
     * @return Number\Number
     */
    public static function process(Number\Number $number, Number\PositiveNumber $precision, Number\PositiveNumber $scale)
    {
        if (Comparison::process($number, Number\Number::create(0), Number\PositiveNumber::create($scale))->getValue() == 1) {
            $floored = Flooring::process($number, $precision);
            $add = Number\PositiveNumber::create(0);

            if (Comparison::process($number, $floored, Number\PositiveNumber::create($scale))->getValue() == 1) {
                $add = (Comparison::process($precision, Number\Number::create(0), Number\PositiveNumber::create($scale))->getValue() == 1) ?
                    self::getSmallNumber($precision) :
                    Number\PositiveNumber::create(1);
            }

            return Addition::process($number, $add, $precision);
        }

        return Subtraction::process($number, Number\Number::create(0), $precision);
    }

    /**
     * Gets number smaller than scale fits
     *
     * @param Number\PositiveNumber $scale
     *
     * @return Number\Number
     */
    protected static function getSmallNumber(Number\PositiveNumber $scale)
    {
        return Division::process(
            Number\Number::create(1),
            Power::process(Number\Number::create(10), $scale, Number\PositiveNumber::create(0)),
            Number\PositiveNumber::create($scale)
        );
    }
}
