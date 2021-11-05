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
    public function widget()
    {
        return new Widget\Factory();
    }
}
