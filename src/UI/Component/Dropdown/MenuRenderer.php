<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class MenuRenderer
{
    /**
     * @param ModuleAbstract $menu
     * @return string
     */
    public function render(ModuleAbstract $menu) : string
    {
        /* @var Menu $menu */
        $this->assertInstanceOf($menu, [Menu::class]);
    }
}
