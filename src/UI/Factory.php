<?php

namespace iit\Application\UI;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @return Component\Factory
     */
    public function component()
    {
        return new Component\Factory();
    }

    /**
     * @return Element\Factory
     */
    public function element()
    {
        return new Element\Factory();
    }

    /**
     * @return Layout\Factory
     */
    public function layout()
    {
        return new Layout\Factory();
    }

    /**
     * @return XHTML\Factory
     */
    public function xhtml()
    {
        return new XHTML\Factory();
    }
}
