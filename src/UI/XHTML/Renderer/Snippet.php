<?php

namespace iit\Application\UI\XHTML\Renderer;

use iit\Application\UI\Renderer;
use iit\Application\UI\Module;

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
        /* @var \iit\Application\UI\XHTML\Snippet $snippet */
        $this->assertInstanceOf($snippet, \iit\Application\UI\XHTML\Snippet::class);
        
        return $snippet->getContent();
    }
}
