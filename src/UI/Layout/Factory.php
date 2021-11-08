<?php

namespace iit\Application\UI\Layout;

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
     * @return Panel\Factory
     */
    public function container()
    {
        return new Panel\Factory($this->dic);
    }

    /**
     * @return Page\Factory
     */
    public function page()
    {
        return new Page\Factory($this->dic);
    }
}
