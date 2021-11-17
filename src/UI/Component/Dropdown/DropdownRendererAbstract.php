<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\RendererAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class DropdownRendererAbstract extends RendererAbstract
{
    /**
     * @param ItemAbstract[] $items
     * @return string[]
     */
    protected function getRenderedItems(array $items) : array
    {
        $renderedItems = [];

        foreach($items as $item)
        {
            $renderedItems[] = $item->render();
        }

        return $renderedItems;
    }
}
