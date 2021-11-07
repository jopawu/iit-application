<?php

namespace iit\Application\UI\Layout\Page\Renderer;

use iit\Application\UI\Renderer;
use iit\Application\Template\WebTemplate;
use iit\Application\UI\Module;
use iit\Application\UI\Layout\Page\HeaderContentFooter as HeaderContentFooterModule;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class HeaderContentFooter extends Renderer
{

    /**
     * @param Module $headerContentFooter
     * @return string
     */
    public function render(Module $headerContentFooter) : string
    {
        /* @var HeaderContentFooterModule $headerContentFooter */
        $this->assertInstanceOf($headerContentFooter, HeaderContentFooterModule::class);

        $template = new WebTemplate();

        $template->assign('HEADER', $headerContentFooter->getHeaderHtml());
        $template->assign('CONTENT', $headerContentFooter->getContentHtml());
        $template->assign('FOOTER', $headerContentFooter->getFooterHtml());

        return $template->fetch(HeaderContentFooterModule::TEMPLATE_FILE);
    }
}
