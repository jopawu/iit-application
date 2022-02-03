<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param string $id
     * @param string $name
     * @param string $label
     * @return Text
     */
    public function text(string $id, string $name, string $label) : Text
    {
        return new Text($this->dic, $id, $name, $label);
    }

    /**
     * @param string $id
     * @param string $name
     * @param string $label
     * @return Number
     */
    public function number(string $id, string $name, string $label) : Number
    {
        return new Number($this->dic, $id, $name, $label);
    }

    /**
     * @param string $id
     * @param string $name
     * @param string $label
     * @return Select
     */
    public function select(string $id, string $name, string $label) : Select
    {
        return new Select($this->dic, $id, $name, $label);
    }

    /**
     * @param string $id
     * @param string $name
     * @param string $label
     * @return Date
     */
    public function date(string $id, string $name, string $label) : Date
    {
        return new Date($this->dic, $id, $name, $label);
    }

    /**
     * @param string $id
     * @param string $name
     * @param string $label
     * @return Currency
     */
    public function currency(string $id, string $name, string $label) : Currency
    {
        return new Currency($this->dic, $id, $name, $label);
    }
}
