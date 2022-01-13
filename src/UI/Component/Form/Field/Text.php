<?php

namespace iit\Application\UI\Component\Form\Field;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Text extends FieldAbstract
{
    /**
     * @var string
     */
    protected $value = '';

    /**
     * @param string $value
     * @return Text
     */
    public function withValue(string $value) : Text
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
