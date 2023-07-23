<?php

namespace iit\Application\Formatter;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Plaintext extends Formatter
{
    /**
     * @param mixed $plaintext
     * @return string
     */
    public function format($plaintext): string
    {
        return $plaintext;
    }
}