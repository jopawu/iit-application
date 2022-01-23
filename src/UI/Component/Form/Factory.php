<?php

namespace iit\Application\UI\Component\Form;

use iit\Application\Helper\DicTrait;
use iit\Application\UI\Component\Form\Field\FieldAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param string $id
     * @param string $name
     * @param string $action
     * @param string $label
     * @return Container
     */
    public function container(string $id, string $name, string $action, string $label) : Container
    {
        return new Container($this->dic, $id, $name, $action, $label);
    }

    /**
     * @param string $command
     * @param string $label
     * @return Submit
     */
    public function submit(string $command, string $label) : Submit
    {
        return new Submit($this->dic, $command, $label);
    }

    /**
     * @param string $label
     * @return FieldSet
     */
    public function fieldset(string $label) : FieldSet
    {
        return new Fieldset($this->dic, $label);
    }

    /**
     * @return Field\Factory
     */
    public function field() : Field\Factory
    {
        return new Field\Factory($this->dic);
    }
}
