<?php

namespace iit\Application\UI\Widget\Tabs;

use iit\Application\Template\WebTemplate;
use iit\Application\Template\TemplateBase;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Bar
{
    const TEMPLATE = 'UI/Widget/Tabs/tabs.html';

    /**
     * @var string
     */
    protected $id;

    /**
     * @var Tab[]
     */
    protected $tabs;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param Tab $tab
     */
    public function addTab(Tab $tab)
    {
        $this->tabs[] = $tab;
    }

    /**
     * @return string
     */
    public function render()
    {
        $template = new WebTemplate(TemplateBase::LIB_TEMPLATE_DIR);

        $template->assign('ID', $this->id);
        $template->assign('TABS', $this->getTabsVariable());

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @return array
     */
    protected function getTabsVariable()
    {
        $tabs = [];

        foreach($this->tabs as $tab)
        {
            $tabs[] = $tab->toArray();
        }

        return $tabs;
    }
}
