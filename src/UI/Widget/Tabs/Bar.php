<?php

namespace iit\Application\UI\Widget\Tabs;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Bar
{
    /**
     * @var Tab[]
     */
    protected $tabs;

    /**
     * @param Tab $tab
     */
    protected function addTab(Tab $tab)
    {
        $this->tabs[] = $tab;
    }


}
