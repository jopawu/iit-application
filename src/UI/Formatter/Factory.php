<?php

namespace iit\Application\UI\Formatter;

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
    public function currency(): Currency
    {
        return new Currency($this->dic);
    }

    /**
     * @return Date
     */
    public function date(): Date
    {
        return new Date($this->dic);
    }

    /**
     * @return LineSplitted
     */
    public function linesplitted(): LineSplitted
    {
        return new LineSplitted($this->dic);
    }

    /**
     * @return Plaintext
     */
    public function plaintext(): Plaintext
    {
        return new Plaintext($this->dic);
    }
}