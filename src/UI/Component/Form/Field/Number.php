<?php

namespace iit\Application\UI\Component\Form\Field;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Number extends FieldAbstract
{
    /**
     * @var string
     */
    protected $value = '';

    /**
     * @param string $value
     * @return Number
     */
    public function withValue(string $value) : Number
    {
        $clone = clone $this;
        $clone->value = $value;
        return $clone;
    }

    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->value;
    }
}
