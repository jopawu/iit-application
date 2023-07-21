<?php

namespace iit\Application\Datatypes\Calendar\Date;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Date
     */
    public function today() : Date
    {
        return new Date(time());
    }
}