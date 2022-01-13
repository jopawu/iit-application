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
     * @return Standard
     */
    public function standard()
    {
        return new Standard();
    }
}
