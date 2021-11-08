<?php

namespace iit\Application\UI\Layout\Page;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class HeaderContentFooter extends ModuleAbstract
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
     * @return HeaderContentFooter
     */
    public function withAddedHeaderHtml($headerHtml)
    {
        $clone = clone $this;
        $clone->headerHtml .= $headerHtml;
        return $clone;
    }

    /**
     * @param string $contentHtml
     * @return HeaderContentFooter
     */
    public function withAddedContentHtml($contentHtml)
    {
        $clone = clone $this;
        $clone->contentHtml .= $contentHtml;
        return $clone;
    }

    /**
     * @param string $footerHtml
     * @return HeaderContentFooter
     */
    public function withAddedFooterHtml($footerHtml)
    {
        $clone = clone $this;
        $clone->footerHtml .= $footerHtml;
        return $clone;
    }
}
