<?php

namespace iit\Application\UI\Element\Content\Divider;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class HorizontalRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Element/Content/Divider/horizontal.html';

    /**
     * @param ModuleAbstract $horizontal
     * @return string
     */
    public function render(ModuleAbstract $horizontal) : string
    {
        /* @var Horizontal $horizontal */
        $this->assertInstanceOf($horizontal, [Horizontal::class]);

        $template = $this->getTemplate();

        $this->renderCssClasses($template, $horizontal);

        return $template->fetch(self::TEMPLATE);
    }
}
