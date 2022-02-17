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
     * @param ModuleAbstract $icon
     * @return string
     */
    public function render(ModuleAbstract $icon) : string
    {
        /* @var Primary $icon */
        $this->assertInstanceOf($icon, [Primary::class]);

        $template = $this->getTemplate();

        $template->assign('HEADER', $icon->getHeader());
        $template->assign('CONTENT', $icon->getContent());
        $template->assign('CLASSES', $icon->getSize());

        return $template->fetch(static::TEMPLATE);
    }
}
