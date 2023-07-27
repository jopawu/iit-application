<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\Datatypes\Money\Balance\Balance;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Money extends FieldAbstract
{
    /**
     * @var string
     */
    protected $value = '';

    /**
     * @param string $value
     * @return Money
     */
    public function withValue(Balance $value) : Money
    {
        $clone = clone $this;
        $clone->value = $value;
        return $clone;
    }

    /**
     * @return Balance
     */
    public function getValue() : Balance
    {
        return $this->value;
    }

}
