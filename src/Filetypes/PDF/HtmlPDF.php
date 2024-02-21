<?php

namespace iit\Application\Filetypes\PDF;

use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class HtmlPDF extends AbstractPDF
{
    const BASIC_CSS_FILE = 'jopawu/iit-application/css/iit-pdf.css';

    /**
     * @var string
     */
    protected $htmlContent;

    /**
     * @var array
     */
    protected $cssFiles;

    /**
     * @param Container $dic
     * @param Metadata $metadata
     * @param PageProperties $pageProperties
     * @param string $html
     */
    public function __construct(
        Container $dic,
        Metadata $metadata,
        PageProperties $pageProperties,
        string $html
)
    {
        parent::__construct($dic, $metadata, $pageProperties);

        $this->pdf->setAutoPageBreak(true, $pageProperties->getMarginBottom());
        $this->pdf->addPage();

        $this->htmlContent = $html;

        $this->cssFiles = [
            $this->dic->config()->getVendorPath() . '/' . self::BASIC_CSS_FILE
        ];
    }

    /**
     * @param string $cssFile
     * @return HtmlPDF
     */
    public function withAddedCssFile(string $cssFile) : HtmlPDF
    {
        $clone = clone $this;
        $clone->cssFiles[] = $this->dic->config()->getApplicationPath().'/'.$cssFile;
        return $clone;
    }

    /**
     * @param string $filename
     */
    public function deliver(string $filename)
    {
        $htmlContent = $this->buildHtmlContent();
        $this->pdf->writeHTML($htmlContent);
        parent::deliver($filename);
    }

    protected function buildHtmlContent()
    {
        $htmlContent = '';

        foreach($this->cssFiles as $cssFile)
        {
            $htmlContent .= "<style>\n".file_get_contents($cssFile)."</style>\n";
        }

        $htmlContent .= $this->htmlContent;

        return $htmlContent;
    }
}