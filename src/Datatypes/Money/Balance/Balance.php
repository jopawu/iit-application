<?php

namespace iit\Application\Datatypes\Money\Balance;

use iit\Application\Datatypes\Money\Currency\Currency;
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
     * @param int $value
     * @param Currency $currency
     */
    public function __construct(int $value, Currency $currency)
    {
        $this->value = $value;
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @return bool
     */
    public function isNegative() : bool
    {
        return $this->value < 0;
    }

    /**
     * @return float
     */
    public function getDecimal() : float
    {
        return round($this->value / 100, 2);
    }

    /**
     * @param Balance $balance
     * @return Balance
     */
    public function withBalanceAdded(Balance $balance) : Balance
    {
        $clone = clone $this;
        $clone->value = $this->value + $balance->getValue();
        return $clone;
    }

    /**
     * @return Balance
     */
    public function withNegatedValue() : Balance
    {
        $clone = clone $this;
        $clone->value = $this->value * -1;
        return $clone;
    }

    /**
     * @return Balance
     */
    public function clone() : Balance
    {
        return clone $this;
    }
}
