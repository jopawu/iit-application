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

    const LOCALE_PHP_FORMATTER = 'de_DE';
    const USE_PHP_FORMATTER = false;

    /**
     * @var bool
     */
    protected $unitSymbolAlwaysFirst = false;

    /**
     * @var bool
     */
    protected $unitSymbolAlwaysLast = false;

    /**
     * @return Currency
     */
    public function withUnitSymbolAlwaysFirst()
    {
        $clone = clone $this;
        $clone->unitSymbolAlwaysFirst = true;
        $clone->unitSymbolAlwaysLast = false;
        return $clone;
    }

    /**
     * @return Currency
     */
    public function withUnitSymbolAlwaysLast()
    {
        $clone = clone $this;
        $clone->unitSymbolAlwaysFirst = false;
        $clone->unitSymbolAlwaysLast = true;
        return $clone;
    }

    /**
     * @param mixed $balance
     * @return string
     */
    public function format($balance): string
    {
        /* @var Balance $balance */
        $this->assertInstanceOf($balance, [Balance::class]);

        if( self::USE_PHP_FORMATTER )
        {
            return $this->usingPhpNumberFormatted($balance);
        }

        return $this->usingMyFormatted($balance);
    }

    /**
     * @param Balance $balance
     * @return false|string
     */
    protected function usingMyFormatted(Balance $balance)
    {
        if( $this->isSymbolFirst($balance) )
        {
            return $balance->getCurrency()->getUnitSymbol() . ' ' . $this->formatValue($balance);
        }

        return $this->formatValue($balance) . ' ' . $balance->getCurrency()->getUnitSymbol();
    }

    /**
     * @param Balance $balance
     * @return bool
     */
    protected function isSymbolFirst(Balance $balance)
    {
        if( $this->unitSymbolAlwaysLast )
        {
            return false;
        }

        return $balance->getCurrency()->isSymbolFirst();
    }

    /**
     * @param Balance $balance
     * @return string
     */
    protected function formatValue(Balance $balance) : string
    {
        $sign = $balance->isNegative() ? '-' : '';
        $positiveFloat = $sign ? $balance->withNegatedValue()->getDecimal() : $balance->getDecimal();

        list($integerPart, $decimalPart) = explode('.', $positiveFloat);

        $integerPartThousandsSeparated = $this->buildThousandsSeparatedIntegerPart(
            $integerPart, $balance->getCurrency()->getThousandsSeparator()
        );

        $decimalPartDigitCompleted = $this->buildDigitCompletedDecimalPart(
            $decimalPart, $balance->getCurrency()->getDecimalPrecision()
        );

        $value = $sign . $integerPartThousandsSeparated;
        $value .= $balance->getCurrency()->getDecimalMark();
        $value .= $decimalPartDigitCompleted;

        return $value;
    }

    /**
     * @param string $integer
     * @param string $thousendsSeparator
     * @return string
     */
    protected function buildThousandsSeparatedIntegerPart(string $integer, string $thousendsSeparator)
    {
        if( strlen($integer) > 3 )
        {
            $intSeparated = '';

            while( strlen($integer) > 3 )
            {
                $intSeparated = substr($integer, -3, 3) . $intSeparated;
                $intSeparated = $thousendsSeparator . $intSeparated;

                $integer = substr($integer, 0, strlen($integer) - 3);
            }

            return $integer . $intSeparated;
        }

        return (string)$integer;
    }

    /**
     * @param string|null $decimalPart
     * @param int $decimalPrecision
     * @return string
     */
    protected function buildDigitCompletedDecimalPart(?string $decimalPart, int $decimalPrecision)
    {
        while( strlen($decimalPart) < $decimalPrecision )
        {
            $decimalPart .= '0';
        }

        return $decimalPart;
    }

    /**
     * @param Balance $balance
     * @return false|string
     */
    protected function usingPhpNumberFormatted(Balance $balance)
    {
        $formatter = NumberFormatter::create(
            self::LOCALE_PHP_FORMATTER, NumberFormatter::CURRENCY
        );

        return $formatter->format(
            $balance->getValue() / $balance->getCurrency()->getSubunitFactor()
        );
    }
}