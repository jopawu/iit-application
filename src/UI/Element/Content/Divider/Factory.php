<?php

namespace iit\Application\UI\Element\Content\Divider;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Horizontal
     */
    public function horizontal() : Horizontal
    {
        return new Horizontal($this->dic);
    }
}
