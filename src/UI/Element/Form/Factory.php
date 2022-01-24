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
     * @param string $id
     * @param string $name
     * @param string $value
     * @return Input
     */
    public function input(string $id, string $name, string $value) : Input
    {
        return new Input($this->dic, $id, $name, $value);
    }

    /**
     * @param string $label
     * @param string $command
     * @return Submit
     */
    public function submit(string $label, string $command) : Submit
    {
        return new Submit($this->dic, $label, $command);
    }

    /**
     * @param string $parameter
     * @param string $value
     * @return Hidden
     */
    public function hidden(string $parameter, string $value) : Hidden
    {
        return new Hidden($this->dic, $parameter, $value);
    }
}
