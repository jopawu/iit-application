<?php

namespace iit\Application\UI\Component\Tabs;

use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\RendererAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class TabRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Tabs/tab.html';

    /**
     * @param ModuleAbstract $tab
     * @return string
     */
    function render(ModuleAbstract $tab) : string
    {
        /* @var Tab $tab */
        $this->assertInstanceOf($tab, [Tab::class]);

        $template = $this->getTemplate();

        $template->assign('TAB_AWARE', $tab->getTabAware()->render());

        return $template->fetch(self::TEMPLATE);
    }
}
