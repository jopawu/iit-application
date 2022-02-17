<?php

namespace iit\Application\UI\Element\Navigation;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;
use iit\Application\UI\Component\Navbar\NavAware;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Button extends ModuleAbstract implements NavAware
{
    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $href;

    /**
     * @var bool
     */
    protected $primaryState;

    /**
     * @param string $label
     * @param string $href
     */
    public function __construct(Container $dic, string $label, string $href)
    {
        parent::__construct($dic);

        $this->label = $label;
        $this->href = $href;
        $this->primaryState = false;
    }

    /**
     * @return string
     */
    public function getLabel() : string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getHref() : string
    {
        return $this->href;
    }

    /**
     * @return bool
     */
    public function isPrimaryState() : bool
    {
        return $this->primaryState;
    }

    /**
     * @return bool
     */
    public function withPrimaryState(bool $primaryState = true) : Button
    {
        $clone = clone $this;
        $clone->primaryState = $primaryState;
        return $clone;
    }


}
