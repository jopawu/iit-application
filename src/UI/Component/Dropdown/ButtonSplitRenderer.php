<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ButtonSplitRenderer extends DropdownRendererAbstract
{
    const TEMPLATE_FILE = 'UI/Component/Dropdown/Split.html';

    /**
     * @param ModuleAbstract $buttonSplit
     * @return string
     */
    public function render(ModuleAbstract $buttonSplit) : string
    {
        /* @var ButtonSplit $buttonSplit */
        $this->assertInstanceOf($buttonSplit, [ButtonSplit::class]);
    }
}
