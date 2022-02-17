<?php

namespace iit\Application\UI\Icon\Item;

use iit\Application\UI\Icon\IconRenderer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class EditRenderer extends IconRenderer
{
    const CSS_CLASS = 'bi-pencil-square';

    /**
     * @return string
     */
    protected function getIconCssClass() : string
    {
        return self::CSS_CLASS;
    }
}
