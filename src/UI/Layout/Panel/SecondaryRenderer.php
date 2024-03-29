<?php

namespace iit\Application\UI\Layout\Panel;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class SecondaryRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Layout/Panel/secondary.html';

    /**
     * @param ModuleAbstract $tertiary
     * @return string
     */
    function render(ModuleAbstract $tertiary) : string
    {
        /* @var Secondary $tertiary */
        $this->assertInstanceOf($tertiary, [Secondary::class]);

        $template = $this->getTemplate();

        $template->assign('CONTENT', $tertiary->getContent());

        return $template->fetch(self::TEMPLATE);
    }
}
