<?php

namespace iit\Application\Navigation;

use iit\Application\DI\Container;

class Creator
{
    /**
     * @var Container
     */
    protected $dic;

    /**
     * @var System
     */
    protected $navSystem;

    /**
     * @param Container $dic
     * @param System $navSystem
     */
    public function __construct(Container $dic, System $navSystem)
    {
        $this->dic = $dic;
        $this->navSystem = $navSystem;
    }

    /**
     * @param string|null $ctrl
     * @return Link
     */
    public function link(string $ctrl = null) : Link
    {
        if( $ctrl === null )
        {
            $ctrl = $this->navSystem->resolver()->paramCtrl();
        }

        return new Link($this->navSystem->resolver()->script(), $ctrl);
    }
}