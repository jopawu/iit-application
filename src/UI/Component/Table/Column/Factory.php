<?php

namespace iit\Application\UI\Component\Table\Column;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param string $identifier
     * @return Date
     */
    public function date(string $identifier) : Date
    {
        return new Date($this->dic, $identifier);
    }

    /**
     * @param string $identifier
     * @return Numeric
     */
    public function numeric(string $identifier) : Numeric
    {
        return new Numeric($this->dic, $identifier);
    }

    /**
     * @param string $identifier
     * @return Text
     */
    public function text(string $identifier) : Text
    {
        return new Text($this->dic, $identifier);
    }
}