<?php

namespace iit\Application\UI\Widget\Menu;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class EntryList
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var Entry[]
     */
    protected $entries;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param Entry $entry
     */
    public function addEntry(Entry $entry)
    {
        $this->entries[] = $entry;
    }

    /**
     * @return array
     */
    public function getTemplateArray()
    {
        $tplArray = [
            'id' => $this->id, 'entries' => []
        ];

        foreach($this->entries as $entry)
        {
            $tplArray['entries'][] = $entry->getTemplateArray();
        }

        return $tplArray;
    }
}
