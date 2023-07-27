<?php

namespace iit\Application\Datatypes\Money;

use iit\Application\Datatypes\Money\Currency\Currency;
use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Balance\Factory
     */
    public function balance(Currency $currency) : Balance\Factory
    {
        new Balance\Factory($this->dic, $currency);
    }

    /**
     * @return Currency
     */
    public function currency() : Currency\Factory
    {
        new Currency\Factory($this->dic);
    }
}