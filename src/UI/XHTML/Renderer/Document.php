<?php

namespace iit\Application\UI\XHTML\Renderer;

use iit\Application\Template\WebTemplate;
use iit\Application\UI\Renderer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Document extends Renderer
{
    /**
     * @param Module $document
     * @return string
     */
    public function render(Module $document) : string
    {
        /* @var \iit\Application\UI\XHTML\Document $document */
        $this->assertInstanceOf($document, \iit\Application\UI\XHTML\Document::class);

        $template = new WebTemplate();
        
        $template->assign('PAGE_STYLESHEETS', $document->getStylesheets());
        $template->assign('PAGE_JAVASCRIPTS', $document->getJavascripts());

        $template->assign('PAGE_BODY', $document->getBody()->render());

        return $template->fetch(Document::TEMPLATE_FILE);
    }
}
