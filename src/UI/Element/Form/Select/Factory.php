<?php

namespace iit\Application\UI\Element\Form\Select;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param string $label
     * @param string $name
     * @param Option[]  $options
     * @return Menu
     */
    public function menu(string $id, string $name, array $options) : Menu
    {
        return new Menu($this->dic, $id, $name, $options);
    }

    /**
     * @param string $label
     * @param string $value
     * @return Option
     */
    public function option(string $label, string $value) : Option
    {
        return new Option($this->dic, $label, $value);
    }
}
