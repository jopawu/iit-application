<?php

namespace iit\Application\UI\Icon;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class IconRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Icon/icon.html';

    /**
     * @param ModuleAbstract $icon
     * @return string
     */
    public function render(ModuleAbstract $icon) : string
    {
        /* @var IconAbstract $icon */
        $this->assertInstanceOf($icon, [IconAbstract::class]);

        $template = $this->getTemplate();

        $template->assign('ICON_CSS_CLASS', $this->getIconCssClass());

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @return string
     */
    abstract protected function getIconCssClass() : string;
}
