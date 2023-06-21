<?php

namespace iit\Application\UI\Component\Glyph\Chevron;

use iit\Application\UI\Component\Glyph\GlyphRenderer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class UpRenderer extends GlyphRenderer
{
    const GLYPH_CSS_CLASS = 'chevron-up';

    /**
     * @return string
     */
    protected function getGlyphCssClass(): string
    {
        return self::GLYPH_CSS_CLASS;
    }
}