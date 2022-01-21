<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\Helper\DicTrait;
use iit\Application\Datatypes\Time\Date as DateValue;

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
     * @return DateValue
     */
    public function getValue() : DateValue
    {
        return $this->value;
    }
}
