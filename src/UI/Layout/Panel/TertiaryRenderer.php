<?php

namespace iit\Application\UI\Layout\Panel;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class TertiaryRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Layout/Panel/tertiary.html';

    /**
     * @param ModuleAbstract $tertiary
     * @return string
     */
    function render(ModuleAbstract $tertiary) : string
    {
        /* @var Secondary $tertiary */
        $this->assertInstanceOf($tertiary, [Tertiary::class]);

        $template = $this->getTemplate();

        $template->assign('CONTENT', $tertiary->getContent());

        return $template->fetch(self::TEMPLATE);
    }
}
