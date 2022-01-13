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
}
