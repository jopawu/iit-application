<?php

namespace iit\Application\UI\Element\Navigation;

use iit\Application\UI\Module;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Link extends Module
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
    public function __construct(string $label, string $href)
    {
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
    public function isDisabled() : bool
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
