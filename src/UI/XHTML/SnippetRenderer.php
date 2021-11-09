<?php

namespace iit\Application\UI\XHTML;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class SnippetRenderer extends RendererAbstract
{
    /**
     * @param ModuleAbstract $snippet
     * @return string
     */
    public function render(ModuleAbstract $snippet) : string
    {
        /* @var Snippet $snippet */
        $this->assertInstanceOf($snippet, [Snippet::class]);
        
        return $snippet->getContent();
    }
}
