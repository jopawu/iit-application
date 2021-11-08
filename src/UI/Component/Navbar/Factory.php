<?php

namespace iit\Application\UI\Component\Navbar;

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
     * @return Bar
     */
    public function bar() : Bar
    {
        return new Bar();
    }

    /**
     * @return Bar
     */
    public function nav() : Nav
    {
        return new Nav();
    }
}
