<?php

namespace iit\Application\UI\Element\Content\Paragraph;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Standard
     */
    public function standard($content) : Standard
    {
        return new Standard($this->dic, $content);
    }
}
