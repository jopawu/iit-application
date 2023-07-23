<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\Helper\DicTrait;
use iit\Application\Datatypes\Calendar\Date\Date as DateValue;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Date extends FieldAbstract
{
    /**
     * @var DateValue
     */
    protected $value = null;

    /**
     * @param DateValue $value
     * @return Date
     */
    public function withValue(DateValue $value) : Date
    {
        $clone = clone $this;
        $clone->value = $value;
        return $clone;
    }

    /**
     * @return bool
     */
    public function hasValue() : bool
    {
        return $this->value instanceof DateValue;
    }

    /**
     * @return DateValue
     */
    public function getValue() : DateValue
    {
        return $this->value;
    }
}
