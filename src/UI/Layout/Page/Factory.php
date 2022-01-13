<?php

namespace iit\Application\UI\Layout\Page;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return HeaderContentFooter
     */
    public function HeaderContentFooter()
    {
        return new HeaderContentFooter($this->dic);
    }
}
