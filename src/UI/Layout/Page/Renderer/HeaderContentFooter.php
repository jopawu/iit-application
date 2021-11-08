<?php

namespace iit\Application\UI\Layout\Page\Renderer;

use iit\Application\UI\RendererAbstract;
use iit\Application\Template\WebTemplate;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Layout\Page\HeaderContentFooter as HeaderContentFooterModule;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class HeaderContentFooter extends RendererAbstract
{

    /**
     * @param ModuleAbstract $headerContentFooter
     * @return string
     */
    public function render(ModuleAbstract $headerContentFooter) : string
    {
        /* @var HeaderContentFooterModule $headerContentFooter */
        $this->assertInstanceOf($headerContentFooter, [HeaderContentFooterModule::class]);

        $template = new WebTemplate();

        $template->assign('HEADER', $headerContentFooter->getHeaderHtml());
        $template->assign('CONTENT', $headerContentFooter->getContentHtml());
        $template->assign('FOOTER', $headerContentFooter->getFooterHtml());

        return $template->fetch(HeaderContentFooterModule::TEMPLATE_FILE);
    }
}
