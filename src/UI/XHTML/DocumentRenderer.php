<?php

namespace iit\Application\UI\XHTML;

use iit\Application\Template\WebTemplate;
use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class DocumentRenderer extends RendererAbstract
{
    /**
     * @param ModuleAbstract $document
     * @return string
     */
    public function render(ModuleAbstract $document) : string
    {
        /* @var Document $document */
        $this->assertInstanceOf($document, [Document::class]);

        $template = new WebTemplate();
        
        $template->assign('PAGE_STYLESHEETS', $document->getStylesheets());
        $template->assign('PAGE_JAVASCRIPTS', $document->getJavascripts());

        $template->assign('PAGE_BODY', $document->getBody()->render());

        return $template->fetch(Document::TEMPLATE_FILE);
    }
}
