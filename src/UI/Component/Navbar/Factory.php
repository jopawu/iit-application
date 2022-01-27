<?php

namespace iit\Application\UI\Component\Navbar;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param Nav[]
     * @return Bar
     */
    public function bar(array $navs) : Bar
    {
        return new Bar($this->dic, $navs);
    }

    /**
     * @param NavAware
     * @return Bar
     */
    public function nav(NavAware $navAware) : Nav
    {
        return new Nav($this->dic, $navAware);
    }
}
