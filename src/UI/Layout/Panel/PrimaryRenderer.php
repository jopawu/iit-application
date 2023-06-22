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
     * @param ModuleAbstract $primary
     * @return string
     */
    public function render(ModuleAbstract $primary) : string
    {
        /* @var Primary $primary */
        $this->assertInstanceOf($primary, [Primary::class]);

        $template = $this->getTemplate();

        if( $primary->hasActions() )
        {
            $template->assign('ACTIONS', $primary->getActions()->render());
        }

        $template->assign('HEADER', $primary->getHeader());
        $template->assign('CONTENT', $primary->getContent());
        $template->assign('CLASSES', $primary->getSize());

        return $template->fetch(static::TEMPLATE);
    }
}
