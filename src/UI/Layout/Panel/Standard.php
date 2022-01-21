<?php

namespace iit\Application\UI\Layout\Panel;

use iit\Application\UI\ModuleAbstract;
use iit\Application\Helper\DicTrait;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Standard extends ModuleAbstract
{
    use DicTrait;

    /**
     * @var string
     */
    protected $header;

    /**
     * @var string
     */
    protected $content;

    /**
     * @param string $header
     */
    public function __construct(Container $dic, string $header)
    {
        parent::__construct($dic);
        $this->header = $header;
        $this->content = '';
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
     */
    public function withContent(string $content) : Standard
    {
        $clone = clone $this;
        $clone->content = $content;
        return $clone;
    }


}
