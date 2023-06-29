<?php

namespace iit\Application\UI\Formatter;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Currency extends Formatter
{
    /**
     * @param mixed $balance
     * @return string
     */
    public function format(mixed $balance): string
    {
        return $balance;
    }
}