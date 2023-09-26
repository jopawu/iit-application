<?php

namespace iit\Application\Filetypes;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return PDF\Factory
     */
    public function pdf(): PDF\Factory
    {
        return new PDF\Factory($this->dic);
    }
}