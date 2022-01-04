<?php

namespace iit\Application\UI\Element\Form;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Select\Factory
     */
    public function select() : Select\Factory
    {
        return new Select\Factory($this->dic);
    }

    /**
     * @return Radio\Factory
     */
    public function radio() : Radio\Factory
    {
        return new Radio\Factory($this->dic);
    }

    /**
     * @return Checkbox
     */
    public function checkbox() : Checkbox
    {
        return new Checkbox();
    }

    /**
     * @return Input
     */
    public function input() : Input
    {
        return new Input();
    }
}
