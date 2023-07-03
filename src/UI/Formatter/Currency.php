<?php

namespace iit\Application\UI\Formatter;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Currency extends Formatter
{
    const LOCALE = 'de_DE';

    /**
     * @param mixed $balance
     * @return string
     */
    public function format($balance): string
    {
        /* @var  */
        $formatter = NumberFormatter::create(self::LOCALE, NumberFormatter::CURRENCY);
        return $formatter->format($balance->getValue() / 100);

        return $balance;
    }
}