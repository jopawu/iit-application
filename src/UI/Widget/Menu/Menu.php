<?php

namespace iit\Application\UI\Widget\Menu;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Menu
{
    const TEMPLATE = 'UI/Widget/Menu/menu.html';

    /**
     * @var string
     */
    protected $id;

    /**
     * @var EntryList[]
     */
    protected $entryList;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }
}
