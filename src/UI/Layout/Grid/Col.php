<?php

namespace iit\Application\UI\Layout\Grid;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Col extends ModuleAbstract
{
    const SCREEN_XS = 'col';
    const SCREEN_SM = 'col-sm';
    const SCREEN_MD = 'col-md';
    const SCREEN_LG = 'col-lg';
    const SCREEN_XL = 'col-xl';
    const SCREEN_XXL = 'col-xxl';

    const WIDTH_AUTO = 'auto';

    /**
     * @var string
     */
    protected $content;

    /**
     * @var array
     */
    protected $width = [];

    /**
     * @param Container $dic
     * @param string $content
     */
    public function __construct(Container $dic, string $content)
    {
        parent::__construct($dic);
        $this->content = $content;
        $this->width = [];
    }

    /**
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    }

    /**
     * @return array
     */
    public function getWidth() : array
    {
        return $this->width;
    }

    /**
     * @param int    $width
     * @param string $screen
     * @return Col
     */
    public function withWidth(int $width, string $screen = self::SCREEN_XS) : Col
    {
        $clone = clone $this;
        $clone->width[$screen] = $width;
        return $clone;
    }

    /**
     * @param string $screen
     * @return Col
     */
    public function withAutoWidth(string $screen = self::SCREEN_XS) : Col
    {
        $clone = clone $this;
        $clone->width[$screen] = self::WIDTH_AUTO;
        return $clone;
    }
}
