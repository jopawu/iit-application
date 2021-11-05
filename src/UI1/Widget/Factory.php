<?php

namespace iit\Application\UI\Widget;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @return TabbedPanels\Factory
     */
    public function tabbedPanels()
    {
        return new TabbedPanels\Factory();
    }
}
