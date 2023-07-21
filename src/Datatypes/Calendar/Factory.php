<?php

namespace iit\Application\Datatypes\Calendar;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Date\Factory
     */
    public function date() : Date\Factory
    {
        return new Date\Factory($this->dic);
    }

    /**
     * @return DateTime\Factory
     */
    public function datetime() : DateTime\Factory
    {
        return new DateTime\Factory($this->dic);
    }

    /**
     * @return TimeZone\Factory
     */
    public function timezone() : TimeZone\Factory
    {
        return new TimeZone\Factory($this->dic);
    }
}