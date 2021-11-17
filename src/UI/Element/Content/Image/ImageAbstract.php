<?php

namespace iit\Application\UI\Element\Content\Image;

use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class ImageAbstract extends ModuleAbstract
{
    /**
     * @var string
     */
    protected $src;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var int|null
     */
    protected $width;

    /**
     * @var int|null
     */
    protected $height;

    /**
     * @var bool
     */
    protected $responsive;
    
    /**
     * @param string $src
     */
    public function __construct(string $src)
    {
        $this->src = $src;

        $this->label = '';
        $this->width = null;
        $this->height = null;
        $this->responsive = false;
    }

    /**
     * @return string
     */
    public function getSrc() : string
    {
        return $this->src;
    }

    /**
     * @return string
     */
    public function getLabel() : string
    {
        return $this->label;
    }

    /**
     * @return int|null
     */
    public function getWidth() : ?int
    {
        return $this->width;
    }

    /**
     * @return int|null
     */
    public function getHeight() : ?int
    {
        return $this->height;
    }

    /**
     * @return bool
     */
    public function isResponsive() : bool
    {
        return $this->responsive;
    }

    /**
     * @param string $label
     * @return $this
     */
    public function withLabel(string $label) : self
    {
        $clone = clone $this;
        $clone->label = $label;
        return $clone;
    }

    /**
     * @param int $width
     * @return $this
     */
    public function withWidth(int $width) : self
    {
        $clone = clone $this;
        $clone->width = $width;
        return $clone;
    }

    /**
     * @param int $height
     * @return $this
     */
    public function withHeight(int $height) : self
    {
        $clone = clone $this;
        $clone->height = $height;
        return $clone;
    }

    /**
     * @param bool $responsive
     * @return self
     */
    public function withResponsive(bool $responsive = true) : self
    {
        $clone = clone $this;
        $clone->responsive = $responsive;
        return $clone;
    }
}
