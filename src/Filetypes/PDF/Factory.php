<?php

namespace iit\Application\Filetypes\PDF;

use iit\Application\DI\Container;
use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param Container $dic
     */
    public function __construct(Container $dic)
    {
        $this->dic = $dic;

        /**
         * autoloads class file for TCPDF,
         * provides global TCPDF constants availability
         */
        new \TCPDF();
    }


    /**
     * @param string $html
     * @return PDF
     */
    public function fromHtml(string $html) : HtmlPDF
    {
        return new HtmlPDF(
            $this->dic, $this->metadata(), $this->pageProperties(), $html
        );
    }

    /**
     * @param string $creator
     * @param string $author
     * @param string $title
     * @param string $subject
     * @param string[] $keywords
     * @return Metadata
     */
    public function metadata(
        string $creator = PDF_CREATOR,
        string $author = '',
        string $title = '',
        string $subject = '',
        array $keywords = []
    ) : Metadata
    {
        return new Metadata($creator, $author, $title, $subject, $keywords);
    }

    /**
     * @return PageProperties
     */
    public function pageProperties(): PageProperties
    {
        return new PageProperties();
    }

    /**
     * @return Content
     */
    public function content() : Content\Factory
    {
        return new Content\Factory($this->dic);
    }

    /**
     * @return Marginal\Factory
     */
    public function marginal() : Marginal\Factory
    {
        return new Marginal\Factory($this->dic);
    }
}