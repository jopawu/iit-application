<?php

namespace iit\Application\UI\Formatter;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Date extends Formatter
{
    /**
     * @param mixed $date
     * @return string
     */
    public function format(mixed $date): string
    {
        return $date;
    }
}