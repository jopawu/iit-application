<?php

namespace iit\Application\UI\XHTML\Renderer;

use iit\Application\UI\Renderer;
use iit\Application\UI\Module;
use iit\Application\UI\XHTML\Snippet as SnippetModule;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Snippet extends Renderer
{
    /**
     * @param Module $snippet
     * @return string
     */
    public function render(Module $snippet) : string
    {
        /* @var SnippetModule $snippet */
        $this->assertInstanceOf($snippet, SnippetModule::class);
        
        return $snippet->getContent();
    }
}
