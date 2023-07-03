<?php

namespace iit\Application\Datatypes\Money;

use iit\Application\Datatypes\Money\Currency;
use NumberFormatter;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Balance
{
    /**
     * @var int
     */
    protected $value;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @param int    $value
     */
    public function __construct(int $balanceValue, string $currencyCode = Currency::CODE_EUR)
    {
        $this->value = $value;
        $this->currency = new Currency($currencyCode);
    }

    /**
     * @param Balance $betrag
     * @return Balance
     */
    public function addBalance(Balance $balance) : Balance
    {
        $clone = clone $this;
        $clone->value = $this->value + $balance->getValue();
        return $clone;
    }

    /**
     * @return int
     */
    public function getValue() : int
    {
        return $this->value;
    }

    /**
     * @return Currency
     */
    public function getCurrency() : Currency
    {
        return $this->waehrung;
    }

    /**
     * @return bool
     */
    public function isNegative() : bool
    {
        return $this->value < 0;
    }

    /**
     * @return string
     */
    public function getPresentation() : string
    {

    }

    /**
     * @return Geldbetrag
     */
    public function clone() : Geldbetrag
    {
        return clone $this;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getPresentation();
    }

    /**
     * @param int $integer
     * @return Geldbetrag
     */
    public static function fromInteger(int $integer) : Geldbetrag
    {
        return new Geldbetrag($integer);
    }

    /**
     * @param float $decimal
     * @return Geldbetrag
     */
    public static function fromDecimal(float $decimal) : Geldbetrag
    {
        return self::fromInteger( (int)($decimal * 100) );
    }

    /**
     * @param string $formatted
     * @return Geldbetrag
     */
    public static function fromFormatted(string $formatted) : Geldbetrag
    {
        $integer = (int) str_replace([',','.','€',' '], ['','','',''], $formatted);
        return new Geldbetrag( $integer);
    }
}
