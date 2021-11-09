<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ItemRenderer extends RendererAbstract
{
    /**
     * @param ModuleAbstract $item
     * @return string
     */
    public function render(ModuleAbstract $item) : string
    {
        /* @var Item $item */
        $this->assertInstanceOf($item, [Item::class]);
    }
}
