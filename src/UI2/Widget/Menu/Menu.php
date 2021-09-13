<?php

namespace iit\Application\UI2\Widget\Menu;

use iit\Application\Template\WebTemplate;
use iit\Application\Template\TemplateBase;

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
     * @var EntryList
     */
    protected $entryList;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;

        $this->entryList = new EntryList($id);
    }

    /**
     * @param Entry $entry
     */
    public function addEntry(Entry $entry)
    {
        $this->entryList->addEntry($entry);
    }

    public function render()
    {
        $template = new WebTemplate(TemplateBase::LIB_TEMPLATE_DIR);

        $template->assign('ID', $this->id);
        $template->assign('MENU', $this->entryList->getTemplateArray());

        return $template->fetch(self::TEMPLATE);
    }
}
