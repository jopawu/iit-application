<?php

namespace iit\Application\Datatypes\Money;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Currency
{
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
    public function getCode() : string
    {
        return $this->code;
    }
}
