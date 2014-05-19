<?php

namespace Notrix\BcMath\Number;

/**
 * BcMath positive number
 *
 * @author Vaidas Lažauskas <vaidas@notrix.lt>
 */
class PositiveNumber extends Number
{
    /**
     * Checks if number is positive
     *
     * @param string $number
     *
     * @return bool
     */
    public function isValid($number)
    {
        return (boolean) preg_match('/^\d+(\.\d+)?$/', $number);
    }

    /**
     * Created positive number
     *
     * @param NumberInterface|string $value
     *
     * @return static
     */
    public static function create($value = null)
    {
        if ($value instanceof NumberInterface) {
            $value = $value->getValue();
        }

        return new self($value);
    }
}
