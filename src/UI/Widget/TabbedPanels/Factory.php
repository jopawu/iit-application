<?php

namespace iit\Application\UI\Widget\TabbedPanels;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @param string $id
     * @return Bar
     */
    public function bar($id)
    {
        return new Bar($id);
    }
    /**
     * @param string $href
     * @param string $label
     * @return Tab
     */
    public function tab($href, $label)
    {
        return new Tab($href, $label);
    }
}
