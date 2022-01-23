<?php

namespace iit\Application\UI\Layout\Panel;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Layout\Panel\Standard;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class StandardRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Layout/Panel/standard.html';

    /**
     * @param ModuleAbstract $standard
     * @return string
     */
    public function render(ModuleAbstract $standard) : string
    {
        /* @var Standard $standard */
        $this->assertInstanceOf($standard, [Standard::class]);

        $template = $this->getTemplate();

        $template->assign('HEADER', $standard->getHeader());
        $template->assign('CONTENT', $standard->getContent());

        return $template->fetch(static::TEMPLATE);
    }
}
