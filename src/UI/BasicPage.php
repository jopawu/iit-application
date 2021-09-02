<?php

namespace iit\Application\UI;

use iit\Application\DI\Container;
use iit\Application\Template\TemplateBase;
use iit\Application\Template\HtmlWebTemplate;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class BasicPage
{
    const TEMPLATE_FILE = 'UI/basic_page.html';

    /**
     * @var Container
     */
    protected $dic;

    /**
     * @var HtmlWebTemplate
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
        $this->template = new HtmlWebTemplate(TemplateBase::LIB_TEMPLATE_DIR);
    }

    /**
     * @param string $stylesheetFilename
     */
    public function addStylesheet($stylesheetFilename)
    {
        $stylesheetFilename = $this->completeFilename($stylesheetFilename);
        $this->stylesheets[] = $stylesheetFilename;
    }

    /**
     * @param string $javascriptFilename
     */
    public function addJavascript($javascriptFilename)
    {
        $javascriptFilename = $this->completeFilename($javascriptFilename);
        $this->javascripts[] = $javascriptFilename;
    }

    /**
     * @return string
     */
    public function render(PageContent $pageContent)
    {
        $this->template->assign('PAGE_STYLESHEETS', $this->stylesheets);
        $this->template->assign('PAGE_JAVASCRIPT', $this->javascripts);
        
        $this->template->assign('PAGE_BODY', $pageContent->render());

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
}
