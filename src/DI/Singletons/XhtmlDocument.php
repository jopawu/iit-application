<?php

namespace iit\Application\DI\Singletons;

use iit\Application\UI\Module;
use iit\Application\UI\XHTML\Document;
use iit\Application\UI\XHTML\Snippet;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class XhtmlDocument implements Module
{
    /**
     * @var Document
     */
    protected $instance;

    /**
     * @param Document $instance
     */
    public function __construct(Document $instance)
    {
        $this->instance = $instance;
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->instance->render();
    }

    /**
     * @param Snippet $body
     */
    public function setBody(Snippet $body)
    {
        $this->instance = $this->instance->withBody($body);
    }

    /**
     * @param string $stylesheetFilename
     */
    public function addStylesheet($stylesheetFilename)
    {
        $this->instance = $this->instance->withAddedStylesheet($stylesheetFilename);
    }

    /**
     * @param string $javascriptFilename
     */
    public function addJavascript($javascriptFilename)
    {
        $this->instance = $this->instance->withAddedJavascript($javascriptFilename);
    }

    public function addJquery()
    {
        $this->instance = $this->instance->withAddedJquery();
    }

    public function addJqueryUi()
    {
        $this->instance = $this->instance->withAddedJqueryUi();
    }

    public function addJsGrid()
    {
        $this->instance = $this->instance->withAddedJsGrid();
    }

    public function addBootstrap()
    {
        $this->instance = $this->instance->withAddedBootstrap();
    }
}
