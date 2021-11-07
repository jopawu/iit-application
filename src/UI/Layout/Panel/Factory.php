<?php

namespace iit\Application\UI\Layout\Panel;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @return Standard
     */
    public function standard()
    {
        return new Standard();
    }
}
