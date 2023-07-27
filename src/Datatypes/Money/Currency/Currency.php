<?php

namespace iit\Application\Datatypes\Money\Currency;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Currency
{
    const CURRENCIES_ISO = '../../../../../bheyser/money-currencies-db/config/currency_iso.json';
    const CURRENCIES_NON_ISO = '../../../../../bheyser/money-currencies-db/config/currency_non_iso.json';
    const CURRENCIES_BACKWARDS = '../../../../../bheyser/money-currencies-db/config/currency_backwards_compatible.json';

    const ISO_CODE_EUR = 'EUR';

    /**
     * @var string
     */
    protected $isoCode;

    /**
     * @param string $isoCode
     */
    public function __construct(string $isoCode)
    {
        $this->isoCode = $isoCode;
    }

    /**
     * @return string
     */
    public function getIsoCode() : string
    {
        return $this->isoCode;
    }
}
