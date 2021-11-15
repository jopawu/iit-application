<?php

namespace iit\Application\UI\Element\Content\Image;

use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ThumbnailRenderer extends ImageRendererAbstract
{
    const TEMPLATE_FILE = 'UI/Element/Content/Image/Thumbnail.html';

    /**
     * @param ModuleAbstract $image
     * @return string
     */
    public function render(ModuleAbstract $image) : string
    {
        /* @var Thumbnail $image */
        $this->assertInstanceOf($image, [Thumbnail::class]);

        $template = $this->getTemplate();

        $this->renderCommons($template, $image);

        return $template->fetch(self::TEMPLATE_FILE);
    }
}
