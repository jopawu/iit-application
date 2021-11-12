<?php

namespace iit\Application\UI\Element\Navigation;

use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Component\Navbar\NavAware;
use iit\Application\UI\Component\Dropdown\ItemAware;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Link extends ModuleAbstract implements NavAware, ItemAware
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
    protected $activeState;
    
    /**
     * @var bool
     */
    protected $disabledState;

    /**
     * @param string $label
     * @param string $href
     */
    public function __construct(Container $dic, string $label, string $href)
    {
        parent::__construct($dic);

        $this->label = $label;
        $this->href = $href;

        $this->activeState = false;
        $this->disabledState = false;
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
    public function isActiveState() : bool
    {
        return $this->activeState;
    }

    /**
     * @return bool
     */
    public function isDisabledState() : bool
    {
        return $this->disabledState;
    }

    /**
     * @return Link
     */
    public function withActiveState($activeState = true) : Link
    {
        $clone = clone $this;
        $clone->activeState = $activeState;
        return $clone;
    }

    /**
     * @return Link
     */
    public function withDisabledState($disabledState = true) : Link
    {
        $clone = clone $this;
        $clone->disabledState = $disabledState;
        return $clone;
    }
}
