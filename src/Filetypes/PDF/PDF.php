<?php

namespace iit\Application\Filetypes\PDF;

use TCPDF;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class PDF
{
    /**
     * @var TCPDF
     */
    protected $tcpdf;

    public function __construct()
    {
        $this->tcpdf = new TCPDF(
            PDF_PAGE_ORIENTATION,
            PDF_UNIT,
            PDF_PAGE_FORMAT,
            true,
            'UTF-8',
            false
        );

        $this->tcpdf->setAutoPageBreak(true, PDF_MARGIN_BOTTOM);

        $this->tcpdf->addPage();
    }

    /**
     * @param string $html
     */
    public function writeHtml(string $html)
    {
        $this->tcpdf->writeHTML($html);
    }

    /**
     * @param string $filename
     * @return void
     */
    public function deliver(string $filename)
    {
        $this->tcpdf->Output($filename, 'D');
        exit;
    }

    /**
     * @param string $html
     * @return PDF
     */
    public static function fromHtml(string $html) : PDF
    {
        $pdf = new self();
        $pdf->writeHtml($html);
        return $pdf;
    }
}