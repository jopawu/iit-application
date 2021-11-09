<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\RendererAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class SplitRenderer extends RendererAbstract
{
    /**
     * @param ModuleAbstract $split
     * @return string
     */
    public function render(ModuleAbstract $split) : string
    {
        /* @var Menu $split */
        $this->assertInstanceOf($split, [Menu::class]);


    }

}
