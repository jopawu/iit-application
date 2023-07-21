<?php

namespace iit\Application\UI\Formatter;

use iit\Application\Datatypes\Calendar\Date as DateObject;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Date extends Formatter
{
    const FORMAT_STRING = 'd.m.Y';

    /**
     * @param mixed $date
     * @return string
     */
    public function format(mixed $date): string
    {
        /* @var DateObject $date */
        return date(self::FORMAT_STRING, $date->getUnixTimestamp());
    }
}