<?php

namespace iit\Application\UI\Widget\Menu;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Entry
{
    const TYPE_CATEGORY = 'category';
    const TYPE_DISABLED = 'disabled';
    const TYPE_LINK = 'link';
    const TYPE_TEXT = 'text';

    /**
     * @var string
     */
    protected $type;

    /**
     * @var EntryList
     */
    protected $entryList;

    /**
     * @param string $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }
}
