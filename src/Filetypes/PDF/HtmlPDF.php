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
     * @param string $html
     */
    public function __construct(Container $dic, string $html)
    {
        parent::__construct($dic);

        $this->pdf->setAutoPageBreak(true, PDF_MARGIN_BOTTOM);
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
        $this->writeContent();
        parent::deliver($filename);
    }

    protected function writeContent()
    {
        $htmlContent = '';

        foreach($this->cssFiles as $cssFile)
        {
            $htmlContent .= "<style>\n".file_get_contents($cssFile)."</style>\n";
        }

        $htmlContent .= $this->htmlContent;

        $this->pdf->writeHTML($htmlContent);
    }
}