<?php

namespace iit\Application\UI\Layout\Panel;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param string $header
     * @return Primary
     */
    public function primary(string $header = '') : Primary
    {
        return new Primary($this->dic, $header);
    }

    /**
     * @param string $content
     * @return Secondary
     */
    public function secondary(string $content = '') : Secondary
    {
        return new Secondary($this->dic, $content);
    }

    /**
     * @param string $content
     * @return Tertiary
     */
    public function tertiary(string $content = '') : Tertiary
    {
        return new Tertiary($this->dic, $content);
    }
}
