<?php

namespace iit\Application\UI;

use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @var Container
     */
    protected $dic;

    /**
     * @param Container $dic
     */
    public function __construct(Container $dic)
    {
        $this->dic = $dic;
    }

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
