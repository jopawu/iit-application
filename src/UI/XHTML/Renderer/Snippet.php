<?php

namespace iit\Application\UI\XHTML\Renderer;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\XHTML\Snippet as SnippetModule;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Snippet extends RendererAbstract
{
    /**
     * @param ModuleAbstract $snippet
     * @return string
     */
    public function render(ModuleAbstract $snippet) : string
    {
        /* @var SnippetModule $snippet */
        $this->assertInstanceOf($snippet, [SnippetModule::class]);
        
        return $snippet->getContent();
    }
}
