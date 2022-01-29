<?php

namespace iit\Application\UI\Component\Tabs;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param Tab[]
     * @return Bar
     */
    public function bar(array $tabs) : Bar
    {
        return new Bar($this->dic, $tabs);
    }

    /**
     * @param TabAware
     * @return Tab
     */
    public function tab(TabAware $tabAware) : Tab
    {
        return new Tab($this->dic, $tabAware);
    }
}
