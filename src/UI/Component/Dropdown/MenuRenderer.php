<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class MenuRenderer extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Component/Dropdown/Menu.html';

    /**
     * @param ModuleAbstract $menu
     * @return string
     */
    public function render(ModuleAbstract $menu) : string
    {
        /* @var Menu $menu */
        $this->assertInstanceOf($menu, [Menu::class]);

        $template = $this->getTemplate();

        $template->assign('CLASSES', $this->getClasses($menu));
        $template->assign('LABEL', $menu->getLabel());
        $template->assign('ITEMS', $this->getRenderedItems($menu->getItems()));

        return $template->fetch(self::TEMPLATE_FILE);
    }

    /**
     * @param Menu $menu
     * @return string
     */
    protected function getClasses(Menu $menu) : string
    {
        $classes = [];

        return implode(' ', $classes);
    }

    /**
     * @param ItemAbstract[] $items
     * @return string[]
     */
    protected function getRenderedItems(array $items) : array
    {
        $renderedItems = [];

        foreach($items as $item)
        {
            $renderedItems[] = $item->render();
        }

        return $renderedItems;
    }
}
