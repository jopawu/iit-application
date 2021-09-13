<?php

namespace iit\Application\UI;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @return Widget\Factory
     */
    public function structure()
    {
        return new Structure\Factory();
    }
    /**
     * @return Widget\Factory
     */
    public function component()
    {
        return new Component\Factory();
    }
    /**
     * @return Widget\Factory
     */
    public function widget()
    {
        return new Widget\Factory();
    }
}
