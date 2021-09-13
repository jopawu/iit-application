<?php

namespace iit\Application\UI\Structure\Document;

use iit\Application\DI\Container;
use iit\Application\Template\TemplateBase;
use iit\Application\Template\WebTemplate;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Xhtml
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

    const TEMPLATE_FILE = 'UI/Structure/Document/Xhtml.html';

    /**
     * @var Container
     */
    protected $dic;

    /**
     * @var WebTemplate
     */
    protected $template;

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
        $this->initTemplate();
    }

    protected function initTemplate()
    {
        $this->template = new WebTemplate(TemplateBase::LIB_TEMPLATE_DIR);
    }

    /**
     * @param string $stylesheetFilename
     */
    public function addStylesheet($stylesheetFilename)
    {
        $this->stylesheets[$stylesheetFilename] = $this->completeFilename($stylesheetFilename);
    }

    /**
     * @param string $javascriptFilename
     */
    public function addJavascript($javascriptFilename)
    {
        $this->javascripts[$javascriptFilename] = $this->completeFilename($javascriptFilename);
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->template->assign('PAGE_STYLESHEETS', $this->stylesheets);
        $this->template->assign('PAGE_JAVASCRIPTS', $this->javascripts);
        
        $this->template->assign('PAGE_BODY', $this->dic->content()->render());

        return $this->template->fetch(self::TEMPLATE_FILE);
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

    public function addJquery()
    {
        $this->dic->page()->addJavascript(self::LOCATION_JQUERY_JS);
    }

    public function addJqueryUi()
    {
        $this->dic->page()->addJavascript(self::LOCATION_JQUERYUI_JS);

        $this->dic->page()->addStylesheet(
            self::LOCATION_JQUERYUI_THEME . '/' .
            $this->dic->config()->getJqueryUiTheme() . '/' . self::JQUERY_UI_CSS_FILE
        );
    }

    public function addJsGrid()
    {
        $this->dic->page()->addJavascript(self::LOCATION_JSGRID_JS);

        $this->dic->page()->addStylesheet(self::LOCATION_JSGRID_CSS);
        $this->dic->page()->addStylesheet(self::LOCATION_JSGRID_CSS_THEME);
    }

    public function addBootstrap()
    {
        $this->dic->page()->addJavascript(self::LOCATION_BOOTSTRAP_JS);
        $this->dic->page()->addStylesheet(self::LOCATION_BOOTSTRAP_CSS);
    }
}
