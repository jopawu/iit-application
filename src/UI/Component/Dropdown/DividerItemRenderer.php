<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class DividerItemRenderer extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Component/Dropdown/DividerItem.html';

    /**
     * @param ModuleAbstract $divider
     * @return string
     */
    public function render(ModuleAbstract $divider) : string
    {
        /* @var DividerItem $divider */
        $this->assertInstanceOf($divider, [DividerItem::class]);

        $template = $this->getTemplate();

        return $template->fetch(self::TEMPLATE_FILE);
    }
}
