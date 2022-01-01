<?php

namespace iit\Application\UI\Element\Table;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Cell extends ModuleAbstract
{
    const ALIGN_LEFT = 'left';
    const ALIGN_RIGHT = 'right';
    const ALIGN_CENTER = 'center';

    const COLOR_BLACK = 'black';
    const COLOR_RED = 'red';

    /**
     * @var string
     */
    protected $content;

    /**
     * @var bool
     */
    protected $isHeaderCell;

    /**
     * @var string
     */
    protected $align;

    /**
     * @var string
     */
    protected $width;

    /**
     * @var string
     */
    protected $color;

    /**
     * @param Container $dic
     * @param string    $content
     */
    public function __construct(Container $dic, string $content, bool $isHeaderCell)
    {
        parent::__construct($dic);

        $this->content = $content;
        $this->isHeaderCell = $isHeaderCell;

        $this->align = null;
        $this->width = null;
        $this->color = null;
    }

    /**
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    }

    /**
     * @return bool
     */
    public function isHeaderCell() : bool
    {
        return $this->isHeaderCell;
    }

    /**
     * @param string $align
     * @return Cell
     */
    public function withAlign(string $align) : Cell
    {
        $this->checkAlign($align);
        $clone = clone $this;
        $clone->align = $align;
        return $clone;
    }

    /**
     * @param string $align
     */
    private function checkAlign(string $align)
    {
        if( !in_array($align, [self::ALIGN_LEFT, self::ALIGN_RIGHT, self::ALIGN_CENTER]) )
        {
            throw new \InvalidArgumentException("invalid align given: {$align}");
        }
    }

    /**
     * @return string
     */
    public function getAlign() : ?string
    {
        return $this->align;
    }

    /**
     * @return bool
     */
    public function hasAlign() : bool
    {
        return $this->align !== null;
    }

    /**
     * @param string $width
     * @return Cell
     */
    public function withWidth(string $width) : Cell
    {
        $this->checkWidth($width);
        $clone = clone $this;
        $clone->width = $width;
        return $clone;
    }

    /**
     * @param string $width
     */
    private function checkWidth(string $width)
    {
        if( !preg_match('/^\d+px$/', $width) )
        {
            throw new \InvalidArgumentException("invalid width given: {$width}");
        }
    }

    /**
     * @return string
     */
    public function getWidth() : ?string
    {
        return $this->width;
    }

    /**
     * @return bool
     */
    public function hasWidth() : bool
    {
        return $this->width !== null;
    }

    /**
     * @param string $color
     * @return Cell
     */
    public function withColor(string $color) : Cell
    {
        $this->checkColor($color);
        $clone = clone $this;
        $clone->color = $color;
        return $clone;
    }

    /**
     * @param string $color
     */
    private function checkColor(string $color)
    {
        if( !in_array($color, [self::COLOR_BLACK, self::COLOR_RED]) )
        {
            throw new \InvalidArgumentException("invalid color given: {$color}");
        }
    }

    /**
     * @return string
     */
    public function getColor() : ?string
    {
        return $this->color;
    }

    /**
     * @return bool
     */
    public function hasColor() : bool
    {
        return $this->color !== null;
    }
}
