<?php

namespace iit\Application\UI\Layout\Panel;

use iit\Application\UI\ModuleAbstract;
use iit\Application\Helper\DicTrait;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Primary extends ModuleAbstract
{
    use DicTrait;

    const SIZE_TINY = 'tiny';
    const SIZE_SMALL = 'small';
    const SIZE_MEDIUM = 'medium';
    const SIZE_LARGE = 'large';

    /**
     * @var string
     */
    protected $header;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $size;

    /**
     * @param Container $dic
     * @param string    $header
     */
    public function __construct(Container $dic, string $header)
    {
        parent::__construct($dic);
        $this->header = $header;
        $this->content = '';
        $this->size = self::SIZE_MEDIUM;
    }

    /**
     * @return string
     */
    public function getHeader() : string
    {
        return $this->header;
    }

    /**
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Primary
     */
    public function withContent(string $content) : Primary
    {
        $clone = clone $this;
        $clone->content = $content;
        return $clone;
    }

    /**
     * @return string
     */
    public function getSize() : string
    {
        return $this->size;
    }

    /**
     * @return Primary
     */
    public function withTinySize() : Primary
    {
        $clone = clone $this;
        $clone->size = self::SIZE_TINY;
        return $clone;
    }

    /**
     * @return Primary
     */
    public function withSmallSize() : Primary
    {
        $clone = clone $this;
        $clone->size = self::SIZE_SMALL;
        return $clone;
    }

    /**
     * @return Primary
     */
    public function withLargeSize() : Primary
    {
        $clone = clone $this;
        $clone->size = self::SIZE_LARGE;
        return $clone;
    }
}
