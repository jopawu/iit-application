<?php

namespace iit\Application\UI\Layout\Page;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @return HeaderContentFooter
     */
    public function HeaderContentFooter()
    {
        return new HeaderContentFooter();
    }
}
