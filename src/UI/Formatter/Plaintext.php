<?php

namespace iit\Application\UI\Formatter;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Plaintext extends Formatter
{
    /**
     * @param mixed $plaintext
     * @return string
     */
    public function format(mixed $plaintext): string
    {
        return $plaintext;
    }
}