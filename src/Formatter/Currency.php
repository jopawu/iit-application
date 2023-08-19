<?php

namespace iit\Application\Formatter;

use iit\Application\Datatypes\Money\Balance\Balance;
use iit\Application\Helper\AssertionTrait;
use NumberFormatter;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Currency extends Formatter
{
    use AssertionTrait;

    const LOCALE = 'de_DE';

    /**
     * @param mixed $balance
     * @return string
     */
    public function format($balance): string
    {
        /* @var Balance $balance */
        $this->assertInstanceOf($balance, [Balance::class]);

        $formatter = NumberFormatter::create(self::LOCALE, NumberFormatter::CURRENCY);

        return $formatter->format(
            $balance->getValue() / $balance->getCurrency()->getSubunitFactor()
        );
    }
}