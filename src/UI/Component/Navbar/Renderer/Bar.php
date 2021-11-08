<?php

namespace iit\Application\UI\Component\Navbar\Renderer;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Component\Navbar\Bar as BarModule;
use iit\Application\UI\Component\Navbar\Nav as NavModule;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Bar extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Component/Navbar/Bar.html';

    /**
     * @param ModuleAbstract $bar
     * @return string
     */
    function render(ModuleAbstract $bar) : string
    {
        /* @var BarModule $bar */
        $this->assertInstanceOf($bar, [BarModule::class]);

        $template = $this->getTemplate();

        $template->assign('CLASSES', $this->getClasses($bar));
        $template->assign('NAVS', $this->getRenderedNavs($bar->getNavs()));

        return $template->fetch(self::TEMPLATE_FILE);
    }

    /**
     * @return BarModule
     */
    protected function getClasses(BarModule $bar) : string
    {
        $classes = [];

        return implode(' ', $classes);
    }

    /**
     * @param NavModule[] $navs
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
