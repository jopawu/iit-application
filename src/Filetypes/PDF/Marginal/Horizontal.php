<?php

namespace iit\Application\Filetypes\PDF\Marginal;

use iit\Application\Filetypes\PDF\Content\Content;
use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Horizontal
{
    use DicTrait;

    /**
     * @var int
     */
    protected $border;

    /**
     * @var Content|null
     */
    protected $leftPlacedContent = null;

    /**
     * @var Content|null
     */
    protected $centerPlacedContent = null;

    /**
     * @var Content|null
     */
    protected $rightPlacedContent = null;

    /**
     * @param int $border
     */
    public function __construct(int $border = 0)
    {
        $this->border = $border;
    }

    /**
     * @param int $border
     * @return Horizontal
     */
    public function withBorder(int $border) : Horizontal
    {
        $clone = clone $this;
        $clone->border = $border;
        return $clone;
    }

    /**
     * @param Content $content
     * @return Horizontal
     */
    public function withLeftPlacedContent(Content $content) : Horizontal
    {
        $clone = clone $this;
        $clone->leftPlacedContent = $content;
        return $clone;
    }

    /**
     * @param Content $content
     * @return Horizontal
     */
    public function withCenterPlacedContent(Content $content) : Horizontal
    {
        $clone = clone $this;
        $clone->centerPlacedContent = $content;
        return $clone;
    }

    /**
     * @param Content $content
     * @return Horizontal
     */
    public function withRightPlacedContent(Content $content) : Horizontal
    {
        $clone = clone $this;
        $clone->rightPlacedContent = $content;
        return $clone;
    }

    /**
     * @return int
     */
    public function getBorder(): int
    {
        return $this->border;
    }

    /**
     * @return bool
     */
    public function hasLeftPlacedContent(): bool
    {
        return $this->leftPlacedContent !== null;
    }

    /**
     * @return Content|null
     */
    public function getLeftPlacedContent(): ?Content
    {
        return $this->leftPlacedContent;
    }

    /**
     * @return bool
     */
    public function hasCenterPlacedContent(): bool
    {
        return $this->centerPlacedContent !== null;
    }

    /**
     * @return Content|null
     */
    public function getCenterPlacedContent(): ?Content
    {
        return $this->centerPlacedContent;
    }

    /**
     * @return bool
     */
    public function hasRightPlacedContent(): bool
    {
        return $this->rightPlacedContent !== null;
    }

    /**
     * @return Content|null
     */
    public function getRightPlacedContent(): ?Content
    {
        return $this->rightPlacedContent;
    }

    /**
     * @return void
     */
    public function __clone()
    {
        if( $this->leftPlacedContent !== null )
        {
            $this->leftPlacedContent = clone $this->leftPlacedContent;
        }

        if( $this->centerPlacedContent !== null )
        {
            $this->centerPlacedContent = clone $this->centerPlacedContent;
        }

        if( $this->rightPlacedContent !== null )
        {
            $this->rightPlacedContent = clone $this->rightPlacedContent;
        }
    }
}