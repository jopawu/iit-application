<?php

namespace iit\Application\UI\Icon;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Item\Factory
     */
    public function item() : Item\Factory
    {
        return new Item\Factory($this->dic);
    }
}
