<?php

namespace iit\Application\Datatypes\Money\Balance;

use iit\Application\Datatypes\Money\Currency\Currency;
use iit\Application\DI\Container;
use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @param Currency $currency
     */
    public function __construct(Container $dic, Currency $currency)
    {
        parent::__construct($dic);
        $this->currency = $currency;
    }

    /**
     * @param int $integer
     * @return Balance
     */
    public function fromInteger(int $integer) : Balance
    {
        return new Balance($integer, $this->currency);
    }

    /**
     * @param float $decimal
     * @return Balance
     */
    public function fromDecimal(float $decimal) : Balance
    {
        return $this->fromInteger( (int)($decimal * 100) );
    }

    /**
     * @param string $formatted
     * @return Balance
     */
    public function fromFormatted(string $formatted) : Balance
    {
        $integer = (int) str_replace([',','.','€',' '], ['','','',''], $formatted);
        return new Balance($integer, $this->currency);
    }
}