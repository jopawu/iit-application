<?php

namespace iit\Application\UI\Layout\Page;

use iit\Application\UI\Renderable;
use iit\Application\DI\Container;
use iit\Application\Template\WebTemplate;
use iit\Application\Template\TemplateBase;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class HeaderContentFooter implements Renderable
{
    const TEMPLATE_FILE = 'UI/Structure/Content/page.html';

    /**
     * @var Container
     */
    protected $dic;

    /**
     * @var string
     */
    protected $headerHtml;

    /**
     * @var string
     */
    protected $contentHtml;

    /**
     * @var string
     */
    protected $footerHtml;

    /**
     * @param Container $dic
     */
    public function __construct(Container $dic)
    {
        $this->dic = $dic;

        $this->headerHtml = '';
        $this->contentHtml = '';
        $this->footerHtml = '';
    }

    /**
     * @param string $headerHtml
     */
    public function addHeaderHtml($headerHtml)
    {
        $this->headerHtml .= $headerHtml;
    }

    /**
     * @param string $contentHtml
     */
    public function addContentHtml($contentHtml)
    {
        $this->contentHtml .= $contentHtml;
    }

    /**
     * @param string $footerHtml
     */
    public function addFooterHtml($footerHtml)
    {
        $this->footerHtml .= $footerHtml;
    }

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
