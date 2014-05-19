<?php

namespace Notrix\BcMath\Number;

/**
 * BcMath number interface
 *
 * @author Vaidas Lažauskas <vaidas@notrix.lt>
 */
interface NumberInterface
{
    /**
     * Setter of Value
     *
     * @param string $value
     *
     * @return static
     */
    public function setValue($value);

    /**
     * Getter of Value
     *
     * @return string
     */
    public function getValue();

    /**
     * Checks if number is valid
     *
     * @param string $number
     *
     * @return int
     */
    public function isValid($number);

    /**
     * Created bcmath number
     *
     * @param NumberInterface|string $value
     *
     * @return static
     */
    public static function create($value = null);
}
