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
     * @return Standard
     */
    public function standard(string $header = '') : Standard
    {
        return new Standard($this->dic, $header);
    }

    /**
     * @param string $header
     * @return Large
     */
    public function large(string $header = '') : Large
    {
        return new Large($this->dic, $header);
    }

    /**
     * @param string $header
     * @return Small
     */
    public function small(string $header = '') : Small
    {
        return new Small($this->dic, $header);
    }

    /**
     * @param string $header
     * @return VerySmall
     */
    public function verysmall(string $header = '') : VerySmall
    {
        return new VerySmall($this->dic, $header);
    }
}
