<?php

namespace iit\Application\UI\Component\Presentation;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param Item[] $items
     * @return Listing
     */
    public function listing(array $items) : Listing
    {
        return new Listing($this->dic, $items);
    }

    /**
     * @param string $title
     * @return Item
     */
    public function item(string $title = null) : Item
    {
        return new Item($this->dic, $title);
    }
}
