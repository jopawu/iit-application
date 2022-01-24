<?php

namespace iit\Application\Datatypes\Money;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Currency
{
    const CODE_EUR = 'EUR';

    /**
     * @var string
     */
    protected $code;

    /**
     * @param string $code
     */
    public function __construct(string $code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }
}
