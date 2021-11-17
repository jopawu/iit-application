<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class LinkMenuRenderer extends DropdownRendererAbstract
{
    const TEMPLATE_FILE = 'UI/Component/Dropdown/Menu.html';

    const LINK_CSS_CLASS = 'nav-link';

    /**
     * @param ModuleAbstract $linkMenu
     * @return string
     */
    public function render(ModuleAbstract $linkMenu) : string
    {
        /* @var LinkMenu $linkMenu */
        $this->assertInstanceOf($linkMenu, [LinkMenu::class]);
        
        $template = $this->getTemplate();

        $template->assign('CLASSES', $this->getClasses($linkMenu));
        $template->assign('LABEL', $linkMenu->getLabel());
        $template->assign('ITEMS', $this->getRenderedItems($linkMenu->getItems()));

        return $template->fetch(self::TEMPLATE_FILE);
    }

    /**
     * @param LinkMenu $linkMenu
     * @return string
     */
    protected function getClasses(LinkMenu $linkMenu) : string
    {
        $classes = [
            self::LINK_CSS_CLASS
        ];

        return implode(' ', $classes);
    }
}
