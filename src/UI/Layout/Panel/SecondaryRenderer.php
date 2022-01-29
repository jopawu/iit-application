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
     * @param ModuleAbstract $secondary
     * @return string
     */
    function render(ModuleAbstract $secondary) : string
    {
        /* @var Secondary $secondary */
        $this->assertInstanceOf($secondary, [Secondary::class]);

        $template = $this->getTemplate();

        $template->assign('CONTENT', $secondary->getContent());

        return $template->fetch(self::TEMPLATE);
    }
}
