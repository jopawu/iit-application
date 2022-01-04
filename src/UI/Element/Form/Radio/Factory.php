<?php

namespace iit\Application\UI\Element\Form\Radio;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Group
     */
    public function group() : Group
    {
        return new Group();
    }

    /**
     * @return Option
     */
    public function option() : Option
    {
        return new Option();
    }
}
