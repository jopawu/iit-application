<?php

namespace iit\Application\UI\Formatter;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class Formatter
{
    use DicTrait;

    /**
     * @param mixed $mixed
     * @return string
     */
    abstract public function format($mixed): string;
}