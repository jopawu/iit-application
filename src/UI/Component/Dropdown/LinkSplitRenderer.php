<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class LinkSplitRenderer extends DropdownRendererAbstract
{
    const TEMPLATE_FILE = 'UI/Component/Dropdown/Split.html';

    /**
     * @param ModuleAbstract $linkSplit
     * @return string
     */
    public function render(ModuleAbstract $linkSplit) : string
    {
        /* @var LinkSplit $linkSplit */
        $this->assertInstanceOf($linkSplit, [LinkSplit::class]);
    }
}
