<?php

namespace Notrix\BcMath\Command;

use Notrix\BcMath\Number;

/**
 * Power command
 *
 * @author Vaidas Lažauskas <vaidas@notrix.lt>
 */
class Power implements CommandInterface
{
    /**
     * bcmath command
     */
    const COMMAND = 'bcpow';

    /**
     * Process power command
     *
     * @param Number\Number         $left
     * @param Number\Number         $right
     * @param Number\PositiveNumber $scale
     *
     * @return Number\Number
     */
    public static function process(Number\Number $left, Number\Number $right, Number\PositiveNumber $scale)
    {
        $command = self::COMMAND;

        return Number\Number::create(
            $command($left->getValue(), $right->getValue(), $scale->getValue())
        );
    }

}
