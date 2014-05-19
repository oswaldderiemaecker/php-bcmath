<?php

namespace Notrix\BcMath\Command;

use Notrix\BcMath\Number;

/**
 * Rounding command
 *
 * @author Vaidas Lažauskas <vaidas@notrix.lt>
 */
class Rounding implements CommandInterface
{
    /**
     * Process rounding command
     *
     * @param Number\Number         $number
     * @param Number\PositiveNumber $scale
     *
     * @return Number\Number
     */
    public static function process(Number\Number $number, Number\PositiveNumber $scale)
    {
        $newScale = Addition::process($scale, Number\Number::create(1), Number\PositiveNumber::create(0));

        return (Comparison::process($number, Number\Number::create(0), Number\PositiveNumber::create($newScale))->getValue() >= 0) ?
            Addition::process($number, self::getSmallNumber(Number\PositiveNumber::create($scale)), $scale) :
            Subtraction::process($number, self::getSmallNumber(Number\PositiveNumber::create($scale)), $scale);
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
        $newScale = Addition::process($scale, Number\Number::create(1), Number\PositiveNumber::create(0));

        return Division::process(
            Number\Number::create(5),
            Power::process(Number\Number::create(10), $newScale, Number\PositiveNumber::create(0)),
            Number\PositiveNumber::create($newScale)
        );
    }
}
