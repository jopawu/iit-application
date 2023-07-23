<?php

namespace iit\Application\Datatypes;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Calendar\Factory
     */
    public function calendar() : Calendar\Factory
    {
        return new Calendar\Factory($this->dic);
    }

    /**
     * @return Money\Factory
     */
    public function money() : Money\Factory
    {
        return new Money\Factory($this->dic);
    }
}