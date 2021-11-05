<?php

namespace iit\Application\UI\XHTML;

use iit\Application\UI\Renderer as BasicRenderer;
use iit\Application\Template\WebTemplate;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Renderer extends BasicRenderer
{
    /**
     * @param Document $document
     * @return string
     */
    public function renderDocument(Document $document) : string
    {
        $template = new WebTemplate();
        
        $template->assign('PAGE_STYLESHEETS', $document->getStylesheets());
        $template->assign('PAGE_JAVASCRIPTS', $document->getJavascripts());

        $template->assign('PAGE_BODY', $document->getBody()->render());

        return $template->fetch(Document::TEMPLATE_FILE);
    }

    /**
     * @param Snippet $snippet
     * @return string
     */
    public function renderSnippet(Snippet $snippet) : string
    {
        return $snippet->getContent();
    }
}
