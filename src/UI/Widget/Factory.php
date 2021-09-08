<?php

namespace iit\Application\UI\Widget;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @return Tabs\Factory
     */
    public function tabs()
    {
        return new Tabs\Factory();
    }

    /**
     * @return Menu\Factory
     */
    public function menu()
    {
        return new Menu\Factory();
    }
}
