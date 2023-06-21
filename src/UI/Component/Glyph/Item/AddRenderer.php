<?php

namespace iit\Application\UI\Component\Glyph\Item;

use iit\Application\UI\Component\Glyph\GlyphRenderer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class AddRenderer extends GlyphRenderer
{
    const CSS_CLASS = 'plus-square';

    /**
     * @return string
     */
    protected function getGlyphCssClass() : string
    {
        return self::CSS_CLASS;
    }
}
