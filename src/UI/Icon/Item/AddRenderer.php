<?php

namespace iit\Application\UI\Icon\Item;

use iit\Application\UI\Icon\IconRenderer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class AddRenderer extends IconRenderer
{
    const CSS_CLASS = 'bi-plus-square';

    /**
     * @return string
     */
    protected function getIconCssClass() : string
    {
        return self::CSS_CLASS;
    }
}
