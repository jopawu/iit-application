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

        $template->assign('CLASSES', $this->getClasses($image));

        $template->assign('LABEL', $image->getLabel());
        $template->assign('SRC', $image->getSrc());

        return $template->fetch(self::TEMPLATE_FILE);
    }
}
