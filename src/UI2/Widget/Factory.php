<?php

namespace iit\Application\UI2\Widget;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @return Menu\Factory
     */
    public function menu()
    {
        return new Menu\Factory();
    }

    /**
     * @return Grid\Factory
     */
    public function grid()
    {
        return new Grid\Factory();
    }
}
