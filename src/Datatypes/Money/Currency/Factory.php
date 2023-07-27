<?php

namespace iit\Application\Datatypes\Money\Currency;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Currency
     */
    public function fromIsoCode($isoCode) : Currency
    {
        return new Currency($isoCode);
    }
}