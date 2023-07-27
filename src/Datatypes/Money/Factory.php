<?php

namespace iit\Application\Datatypes\Money;

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
    public function balance(Currency\Currency $currency) : Balance\Factory
    {
        return new Balance\Factory($this->dic, $currency);
    }

    /**
     * @return Currency\Factory
     */
    public function currency() : Currency\Factory
    {
        return new Currency\Factory($this->dic);
    }
}