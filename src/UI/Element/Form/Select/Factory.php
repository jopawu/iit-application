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
     * @return Menu
     */
    public function menu() : Menu
    {
        return new Menu();
    }

    /**
     * @return Option
     */
    public function option() : Option
    {
        return new Option();
    }
}
