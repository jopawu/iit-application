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
     * @var string
     */
    protected $label;

    /**
     * @var EntryList
     */
    protected $entryList;

    /**
     * @param string $type
     * @param string $label
     */
    public function __construct($type, $label)
    {
        $this->type = $type;
        $this->label = $label;

        $this->entryList = new EntryList('');
    }

    /**
     * @param Entry $entry
     */
    public function addSubEntry(Entry $entry)
    {
        $this->entryList->addEntry($entry);
    }

    public function getTemplateArray()
    {
        $tplArray = [
            'label' => $this->label,
            'children' => $this->entryList->getTemplateArray()
        ];

        return $tplArray;
    }
}
