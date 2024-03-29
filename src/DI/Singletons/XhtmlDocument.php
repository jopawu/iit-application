<?php

namespace iit\Application\DI\Singletons;

use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\XHTML\Document;
use iit\Application\UI\XHTML\Snippet;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class XhtmlDocument extends ModuleAbstract
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
    public function render() : string
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
     * @param string $stylesheetFilename
     */
    public function addImportantStylesheet($importantStylesheetFilename)
    {
        $this->instance = $this->instance->withAddedImportantStylesheet(
            $importantStylesheetFilename
        );
    }

    /**
     * @param string $javascriptFilename
     */
    public function addJavascript($javascriptFilename)
    {
        $this->instance = $this->instance->withAddedJavascript($javascriptFilename);
    }

    /**
     * @param $jsonName
     * @param $jsonData
     */
    public function addJsonData($jsonName, $jsonData)
    {
        $this->instance = $this->instance->withAddedJsonData($jsonName, $jsonData);
    }

    public function addJquery()
    {
        $this->instance = $this->instance->withAddedJquery();
    }

    public function addJqueryUi()
    {
        $this->instance = $this->instance->withAddedJqueryUi();
    }

    public function addJqueryChosen()
    {
        $this->instance = $this->instance->withAddedJqueryChosen();
    }

    public function addJsGrid()
    {
        $this->instance = $this->instance->withAddedJsGrid();
    }

    public function addBootstrap()
    {
        $this->instance = $this->instance->withAddedBootstrap();
    }

    public function addIitUiCss()
    {
        $this->instance = $this->instance->withAddedIitUiCss();
    }
}
