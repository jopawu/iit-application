<?php

namespace iit\Application\UI\Layout\Page\Renderer;

use iit\Application\UI\Renderer;
use iit\Application\Template\WebTemplate;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class HeaderContentFooter extends Renderer
{

    /**
     * @return string
     */
    public function render()
    {
        $template = new WebTemplate();

        $template->assign('HEADER', $this->headerHtml);
        $template->assign('CONTENT', $this->contentHtml);
        $template->assign('FOOTER', $this->footerHtml);

        return $template->fetch(self::TEMPLATE_FILE);
    }
}
