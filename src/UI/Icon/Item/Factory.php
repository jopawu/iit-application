<?php

namespace iit\Application\UI\Icon\Item;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Edit
     */
    public function edit() : Edit
    {
        return new Edit($this->dic);
    }

    /**
     * @return Delete
     */
    public function delete() : Delete
    {
        return new Delete($this->dic);
    }
}
