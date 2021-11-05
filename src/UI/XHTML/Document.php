<?php

namespace iit\Application\UI\XHTML;

use iit\Application\UI\Module;
use iit\Application\DI\Container;
use iit\Application\Template\TemplateBase;
use iit\Application\Template\WebTemplate;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Document implements Module
{
    const LOCATION_JQUERY_JS = 'lib/vendor/components/jquery/jquery.min.js';
    const LOCATION_JQUERYUI_JS = 'lib/vendor/components/jqueryui/jquery-ui.min.js';
    const LOCATION_JQUERYUI_THEME = 'lib/vendor/components/jqueryui/themes';
    const JQUERY_UI_CSS_FILE = 'jquery-ui.css';

    const LOCATION_JSGRID_JS = 'lib/vendor/jopawu/iit-application/lib/jsgrid-1.5.3/dist/jsgrid.min.js';
    const LOCATION_JSGRID_CSS = 'lib/vendor/jopawu/iit-application/lib/jsgrid-1.5.3/dist/jsgrid.css';
    const LOCATION_JSGRID_CSS_THEME = 'lib/vendor/jopawu/iit-application/lib/jsgrid-1.5.3/dist/jsgrid-theme.css';

    const LOCATION_BOOTSTRAP_JS = 'lib/vendor/twbs/bootstrap/dist/js/bootstrap.js';
    const LOCATION_BOOTSTRAP_CSS = 'lib/vendor/twbs/bootstrap/dist/css/bootstrap.css';

    const TEMPLATE_FILE = 'UI/XHTML/document.html';

    /**
     * @var Container
     */
    protected $dic;

    /**
     * @var Snippet
     */
    protected $body;

    /**
     * @var array
     */
    protected $stylesheets;

    /**
     * @var array
     */
    protected $javascripts;

    /**
     * @param Container $dic
     */
    public function __construct(Container $dic)
    {
        $this->dic = $dic;
        $this->body = $this->dic->ui()->xhtml()->snippet('');
    }

    /**
     * @return string
     */
    public function render()
    {
        $renderer = new Renderer($this->dic);
        return $renderer->renderDocument($this);
    }

    /**
     * @return Body
     */
    public function getBody() : Snippet
    {
        return $this->body;
    }

    /**
     * @return array
     */
    public function getStylesheets() : array
    {
        return $this->stylesheets;
    }

    /**
     * @return array
     */
    public function getJavascripts() : array
    {
        return $this->javascripts;
    }

    /**
     * @param Snippet $body
     * @return Document
     */
    public function withBody(Snippet $body)
    {
        $clone = clone $this;
        $clone->body = $body;
        return $clone;
    }

    /**
     * @param string $stylesheetFilename
     * @return Document
     */
    public function withAddedStylesheet($stylesheetFilename)
    {
        $clone = clone $this;
        $clone->addStylesheet($stylesheetFilename);
        return $clone;
    }

    /**
     * @param string $javascriptFilename
     * @return Document
     */
    public function withAddedJavascript($javascriptFilename)
    {
        $clone = clone $this;
        $clone->addJavascript($javascriptFilename);
        return $clone;
    }

    /**
     * @return Document
     */
    public function withAddedJquery()
    {
        $clone = clone $this;
        $clone->addJavascript(self::LOCATION_JQUERY_JS);
        return $clone;
    }

    /**
     * @return Document
     */
    public function withAddedJqueryUi()
    {
        $clone = clone $this;

        $clone->addJavascript(self::LOCATION_JQUERYUI_JS);

        $clone->addStylesheet(
            self::LOCATION_JQUERYUI_THEME . '/' .
            $this->dic->config()->getJqueryUiTheme() . '/' . self::JQUERY_UI_CSS_FILE
        );

        return $clone;
    }

    /**
     * @return Document
     */
    public function withAddedJsGrid()
    {
        $clone = clone $this;

        $clone->addJavascript(self::LOCATION_JSGRID_JS);
        $clone->addStylesheet(self::LOCATION_JSGRID_CSS);
        $clone->addStylesheet(self::LOCATION_JSGRID_CSS_THEME);

        return $clone;
    }

    /**
     * @return Document
     */
    public function withAddedBootstrap()
    {
        $clone = clone $this;

        $clone->addJavascript(self::LOCATION_BOOTSTRAP_JS);
        $clone->addStylesheet(self::LOCATION_BOOTSTRAP_CSS);

        return $clone;
    }

    /**
     * @param $stylesheetFilename
     */
    protected function addStylesheet($stylesheetFilename)
    {
        $this->stylesheets[$stylesheetFilename] = $this->completeFilename($stylesheetFilename);
    }

    /**
     * @param $javascriptFilename
     */
    protected function addJavascript($javascriptFilename)
    {
        $this->javascripts[$javascriptFilename] = $this->completeFilename($javascriptFilename);
    }

    /**
     * @param string $filename
     * @return string
     */
    protected function completeFilename($filename)
    {
        if( $this->dic->config()->getVariable('system', 'devmode') )
        {
            $timestamp = time();
            $filename .= "?version={$timestamp}";
        }

        return $filename;
    }
}