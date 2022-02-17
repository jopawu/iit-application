<?php

namespace iit\Application\UI\Element\Content;

use iit\Application\DI\Container;
use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Paragraph\Factory
     */
    public function paragraph() : Paragraph\Factory
    {
        return new Paragraph\Factory($this->dic);
    }

    /**
     * @return Image\Factory
     */
    public function image() : Image\Factory
    {
        return new Image\Factory($this->dic);
    }

    /**
     * @return Listing\Factory
     */
    public function listing() : Listing\Factory
    {
        return new Listing\Factory($this->dic);
    }
}
