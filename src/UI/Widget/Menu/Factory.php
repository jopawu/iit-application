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
    public function list($id)
    {
        return new Menu($id);
    }

    /**
     * @param string $type
     * @param string $label
     * @return Entry
     */
    public function entry($type, $label)
    {
        return new Entry($type, $label);
    }
}
