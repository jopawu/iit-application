<?php

namespace iit\Application\UI\Component\Glyph;

use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\RendererAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class GlyphRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Glyph/glyph.html';

    /**
     * @param ModuleAbstract $glyph
     * @return string
     */
    public function render(ModuleAbstract $glyph) : string
    {
        $template = $this->getTemplate();

        $template->assign('GLYPH_CSS_CLASS', $this->getGlyphCssClass());

        $this->renderCssClasses($template, $glyph);

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @return string
     */
    abstract protected function getGlyphCssClass(): string;
}