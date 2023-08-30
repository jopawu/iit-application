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

        if(true)
        {
            return $this->usingMyFormatted($balance);
        }

        return $this->usingNumberFormatted($balance);
    }

    /**
     * @param Balance $balance
     * @return false|string
     */
    public function usingMyFormatted(Balance $balance)
    {
        if( $balance->getCurrency()->isSymbolFirst() )
        {
            return $balance->getCurrency()->getUnitSymbol() . ' ' . $this->formatValue($balance);
        }

        return $this->formatValue($balance) . ' ' . $balance->getCurrency()->getUnitSymbol();
    }

    /**
     * @param Balance $balance
     * @return string
     */
    protected function formatValue(Balance $balance) : string
    {
        list($int, $dec) = explode('.', $balance->getDecimal())
    }

    /**
     * @param Balance $balance
     * @return false|string
     */
    public function usingNumberFormatted(Balance $balance)
    {
        $formatter = NumberFormatter::create(self::LOCALE, NumberFormatter::CURRENCY);

        return $formatter->format(
            $balance->getValue() / $balance->getCurrency()->getSubunitFactor()
        );
    }
}