<?php

namespace iit\Application\UI\Element\Content\Image;

use iit\Application\UI\RendererAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class ImageRendererAbstract extends RendererAbstract
{
    const CSS_CLASS_RESPONSIVE = 'img-fluid';

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
}
