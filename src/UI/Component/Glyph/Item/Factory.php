<?php

namespace iit\Application\UI\Component\Glyph\Item;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Add
     */
    public function add() : Add
    {
        return new Add($this->dic);
    }

    /**
     * @return Remove
     */
    public function remove() : Remove
    {
        return new Remove($this->dic);
    }

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
