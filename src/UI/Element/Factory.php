<?php

namespace iit\Application\UI\Element;

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
     * @return Content\Factory
     */
    public function content()
    {
        return new Content\Factory($this->dic);
    }

    /**
     * @return Form\Factory
     */
    public function form()
    {
        return new Form\Factory($this->dic);
    }

    /**
     * @return Navigation\Factory
     */
    public function navigation()
    {
        return new Navigation\Factory($this->dic);
    }
}
