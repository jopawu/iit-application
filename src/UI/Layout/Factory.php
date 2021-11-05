<?php

namespace iit\Application\UI\Layout;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @return Container\Factory
     */
    public function container()
    {
        return new Container\Container();
    }

    /**
     * @return Page\Factory
     */
    public function page()
    {
        return new Page\Factory();
    }
}
