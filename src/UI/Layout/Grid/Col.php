<?php

namespace iit\Application\UI\Layout\Grid;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Col extends ModuleAbstract
{
    /**
     * @var string
     */
    protected $content;

    /**
     * @var int
     */
    protected $width;

    /**
     * @param Container $dic
     * @param string $content
     */
    public function __construct(Container $dic, string $content)
    {
        parent::__construct($dic);
        $this->content = $content;
        $this->width = 12;
    }

    /**
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getWidth() : int
    {
        return $this->width;
    }
}
