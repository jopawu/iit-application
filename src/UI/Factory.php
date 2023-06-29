<?php

namespace iit\Application\UI;

use iit\Application\DI\Container;
use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Component\Factory
     */
    public function component()
    {
        return new Component\Factory($this->dic);
    }

    /**
     * @return Element\Factory
     */
    public function element()
    {
        return new Element\Factory($this->dic);
    }

    /**
     * @return Formatter\Factory
     */
    public function formatter()
    {
        return new Formatter\Factory($this->dic);
    }

    /**
     * @return Component\Glyph\Factory
     */
    public function icon()
    {
        return $this->component()->glyph($this->dic);
    }

    /**
     * @return Layout\Factory
     */
    public function layout()
    {
        return new Layout\Factory($this->dic);
    }

    /**
     * @return Widget\Factory
     */
    public function widget()
    {
        return new Widget\Factory($this->dic);
    }

    /**
     * @return XHTML\Factory
     */
    public function xhtml()
    {
        return new XHTML\Factory($this->dic);
    }
}
