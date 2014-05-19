<?php

namespace Notrix\BcMath\Number;

use Notrix\BcMath\Exception;

/**
 * BcMath number
 *
 * @author Vaidas Lažauskas <vaidas@notrix.lt>
 */
class Number implements NumberInterface
{
    /**
     * @var string
     */
    protected $value;

    /**
     * Number constructor
     *
     * @param string $value
     */
    public function __construct($value = null)
    {
        $this->setValue($value);
    }

    /**
     * Setter of Value
     *
     * @param string $value
     *
     * @return static
     *
     * @throws Exception\NumberException
     */
    public function setValue($value)
    {
        if (!$this->isValid($value)) {
            throw new Exception\NumberException('Wrong number format');
        }
        $this->value = $value;

        return $this;
    }

    /**
     * Getter of Value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Checks if number is valid for bcmath operations
     *
     * @param string $number
     *
     * @return bool
     */
    public function isValid($number)
    {
        return (boolean) preg_match('/^\-?\d+(\.\d+)?$/', $number);
    }

    /**
     * Created bcmath number
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
