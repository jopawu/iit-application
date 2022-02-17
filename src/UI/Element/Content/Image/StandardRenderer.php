<?php

namespace iit\Application\UI\Element\Content\Image;

use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class StandardRenderer extends ImageRendererAbstract
{
    const TEMPLATE = 'UI/Element/Content/Image/Standard.html';

    /**
     * @param ModuleAbstract $image
     * @return string
     */
    public function render(ModuleAbstract $image) : string
    {
        /* @var Standard $image */
        $this->assertInstanceOf($image, [Standard::class]);

        $template = $this->getTemplate();

        $this->renderCommons($template, $image);

        return $template->fetch(self::TEMPLATE);
    }
}
