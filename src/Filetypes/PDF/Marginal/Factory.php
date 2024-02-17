<?php

namespace iit\Application\Filetypes\PDF\Marginal;

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
        return new Horizontal();
    }
}