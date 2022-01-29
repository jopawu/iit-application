<?php

namespace iit\Application\UI\Layout\Panel;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class PrimaryRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Layout/Panel/primary.html';

    /**
     * @param ModuleAbstract $standard
     * @return string
     */
    public function render(ModuleAbstract $standard) : string
    {
        /* @var Primary $standard */
        $this->assertInstanceOf($standard, [Primary::class]);

        $template = $this->getTemplate();

        $template->assign('HEADER', $standard->getHeader());
        $template->assign('CONTENT', $standard->getContent());
        $template->assign('CLASSES', $standard->getSize());

        return $template->fetch(static::TEMPLATE);
    }
}
