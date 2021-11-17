<?php

namespace iit\Application\UI\Element\Content\Image;

use iit\Application\UI\RendererAbstract;
use iit\Application\Template\WebTemplate;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class ImageRendererAbstract extends RendererAbstract
{
    const CSS_CLASS_RESPONSIVE = 'img-fluid';

    const ATTR_MASK_WIDTH = 'width="%s"';
    const ATTR_MASK_HEIGHT = 'height="%s"';

    /**
     * @param WebTemplate $template
     * @param ImageAbstract $image
     */
    protected function renderCommons(WebTemplate $template, ImageAbstract $image) : void
    {
        $template->assign('SRC', $image->getSrc());
        $template->assign('LABEL', $image->getLabel());

        $template->assign('CLASSES', $this->getClasses($image));
        $template->assign('ATTRIBUTES', $this->getAttributes($image));
    }

    /**
     * @param ImageAbstract $image
     * @return string
     */
    protected function getClasses(ImageAbstract $image) : string
    {
        $classes = [];

        if( $image->isResponsive() )
        {
            $classes[] = self::CSS_CLASS_RESPONSIVE;
        }

        return implode(' ', $classes);
    }

    /**
     * @param ImageAbstract $image
     * @return string
     */
    protected function getAttributes(ImageAbstract $image) : string
    {
        $attributes = [];

        if( $image->getWidth() !== null )
        {
            $attributes[] = sprintf(self::ATTR_MASK_WIDTH, $image->getWidth());
        }

        if( $image->getHeight() !== null )
        {
            $attributes[] = sprintf(self::ATTR_MASK_HEIGHT, $image->getHeight());
        }

        return implode(' ', $attributes);
    }
}
