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
}
