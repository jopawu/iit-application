<?php

namespace iit\Application\UI\Layout\Page;

use iit\Application\UI\Module;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class HeaderContentFooter extends Module
{
    const TEMPLATE_FILE = 'UI/Layout/Page/header_content_footer.html';

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
     * @return string
     */
    public function getHeaderHtml() : string
    {
        return $this->headerHtml;
    }

    /**
     * @return string
     */
    public function getContentHtml() : string
    {
        return $this->contentHtml;
    }

    /**
     * @return string
     */
    public function getFooterHtml() : string
    {
        return $this->footerHtml;
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
}
