<?php

namespace iit\Application\UI\Widget\Menu;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @param string $id
     * @return Menu
     */
    public function menu($id)
    {
        return new Menu($id);
    }

    /**
     * @param string $href
     * @param string $label
     * @return Entry
     */
    public function entry($href, $label)
    {
        return new Entry($href, $label);
    }
}
