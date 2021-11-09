<?php

namespace iit\Application\UI\Layout\Page;

use iit\Application\UI\RendererAbstract;
use iit\Application\Template\WebTemplate;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class HeaderContentFooterRenderer extends RendererAbstract
{

    /**
     * @param ModuleAbstract $headerContentFooter
     * @return string
     */
    public function render(ModuleAbstract $headerContentFooter) : string
    {
        /* @var HeaderContentFooter $headerContentFooter */
        $this->assertInstanceOf($headerContentFooter, [HeaderContentFooter::class]);

        $template = new WebTemplate();

        $template->assign('HEADER', $headerContentFooter->getHeaderHtml());
        $template->assign('CONTENT', $headerContentFooter->getContentHtml());
        $template->assign('FOOTER', $headerContentFooter->getFooterHtml());

        return $template->fetch(HeaderContentFooter::TEMPLATE_FILE);
    }
}
