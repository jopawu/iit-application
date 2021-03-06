<?php

namespace iit\Application\UI\Component\Navbar;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class BarRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Navbar/bar.html';

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
        $template->assign('NAVS', $this->getRenderedNavs($bar));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Bar $bar
     * @return string
     */
    protected function getClasses(Bar $bar) : string
    {
        $classes = [];

        return implode(' ', $classes);
    }

    /**
     * @param Bar $bar
     * @return string[]
     */
    protected function getRenderedNavs(Bar $bar) : array
    {
        $renderedNavs = [];

        foreach($bar->getNavs() as $nav)
        {
            $renderedNavs[] = $nav->render();
        }

        return $renderedNavs;
    }
}
