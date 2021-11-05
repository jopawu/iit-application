<?php

namespace iit\Application\UI\XHTML;

use iit\Application\UI\Module;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Snippet implements Module
{
    /**
     * @var Container
     */
    protected $dic;

    /**
     * @var string
     */
    protected $content;

    /**
     * @param string $content
     */
    public function __construct(Container $dic, $content)
    {
        $this->dic = $dic;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function render() : string
    {
        $renderer = new Renderer($this->dic);
        return $renderer->renderSnippet($this);
    }

    /**
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    }
}
