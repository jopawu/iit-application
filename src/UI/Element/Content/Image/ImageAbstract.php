<?php

namespace iit\Application\UI\Element\Content\Image;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class ImageAbstract
{
    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $src;

    /**
     * @var bool
     */
    protected $responsive;
    
    /**
     * @param string $label
     * @param string $src
     */
    public function __construct(string $label, string $src)
    {
        $this->label = $label;
        $this->src = $src;
        
        $this->responsive = false;
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
    public function getSrc() : string
    {
        return $this->src;
    }

    /**
     * @return bool
     */
    public function isResponsive() : bool
    {
        return $this->responsive;
    }

    /**
     * @param bool $responsive
     * @return self
     */
    public function withResponsive($responsive = true) : self
    {
        $clone = clone $this;
        $clone->responsive = $responsive;
        return $clone;
    }
}
