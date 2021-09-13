<?php

namespace iit\Application\UI2\Widget\Grid;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @param string $id
     * @return Table
     */
    public function table($id)
    {
        return new Table($id);
    }
}
