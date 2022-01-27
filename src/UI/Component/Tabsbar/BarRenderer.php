<?php

namespace iit\Application\UI\Component\Tabsbar;

use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\RendererAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class BarRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Tabsbar/bar.html';

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
        $template->assign('TABS', $this->getRenderedTabs($bar));

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
    protected function getRenderedTabs(Bar $bar) : array
    {
        $renderedTabs = [];

        foreach($bar->getTabs() as $tab)
        {
            $renderedTabs[] = $tab->render();
        }

        return $renderedTabs;
    }
}
