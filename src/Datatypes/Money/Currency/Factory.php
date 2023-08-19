<?php

namespace iit\Application\Datatypes\Money\Currency;

use iit\Application\DI\Container;
use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param string $code
     * @return Currency
     */
    public function real(string $code) : Currency
    {
        $definitions = new Definitions(
            Definitions::TYPE_REAL, $this->dic->config()->getVendorPath()
        );

        return new Currency(
            Definitions::TYPE_REAL, $definitions->getProperties($code)
        );
    }

    /**
     * @param string $code
     * @return Currency
     */
    public function crypto(string $code) : Currency
    {
        $definitions = new Definitions(
            Definitions::TYPE_CRYPTO, $this->dic->config()->getVendorPath()
        );

        return new Currency(
            Definitions::TYPE_CRYPTO, $definitions->getProperties($code)
        );
    }
}