<?php

namespace iit\Application\UI\Component\Navbar;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class BarRenderer extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Component/Navbar/Bar.html';

    /**
     * @param ModuleAbstract $bar
     * @return string
     */
    function render(ModuleAbstract $bar) : string
    {
        /* @var Bar $bar */
        $this->assertInstanceOf($bar, [Bar::class]);

        $template = $this->getTemplate();

        $template->assign('CLASSES', $this->getClasses($bar));
        $template->assign('NAVS', $this->getRenderedNavs($bar->getNavs()));

        return $template->fetch(self::TEMPLATE_FILE);
    }

    /**
     * @return Bar
     */
    protected function getClasses(Bar $bar) : string
    {
        $classes = [];

        return implode(' ', $classes);
    }

    /**
     * @param Nav[] $navs
     * @return string[]
     */
    protected function getRenderedNavs(array $navs) : array
    {
        $renderedNavs = [];

        foreach($navs as $nav)
        {
            $renderedNavs[] = $nav->render();
        }

        return $renderedNavs;
    }
}
