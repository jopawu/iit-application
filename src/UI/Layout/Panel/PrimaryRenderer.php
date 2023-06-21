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
     * @param ModuleAbstract $glyph
     * @return string
     */
    public function render(ModuleAbstract $glyph) : string
    {
        /* @var Primary $glyph */
        $this->assertInstanceOf($glyph, [Primary::class]);

        $template = $this->getTemplate();

        $template->assign('HEADER', $glyph->getHeader());
        $template->assign('CONTENT', $glyph->getContent());
        $template->assign('CLASSES', $glyph->getSize());

        return $template->fetch(static::TEMPLATE);
    }
}
