<?php

namespace iit\Application\Filetypes\PDF;

use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class AbstractPDF
{
    /**
     * @var Container
     */
    protected $dic;

    /**
     * @var PDF
     */
    protected $pdf;

    /**
     * @param Container $dic
     */
    public function __construct(Container $dic)
    {
        $this->dic = $dic;

        $this->pdf = new PDF(
            Page::FORMAT_DIN_A4,
            Page::DISTANCE_UNIT_MILLIMETER,
            Page::ORIENTATION_PORTRAIT,
            true,
            'UTF-8',
            false
        );

        $this->pdf->SetPrintHeader(false);
        $this->pdf->SetPrintFooter(false);
    }

    /**
     * @return void
     */
    public function __clone()
    {
        $this->pdf = clone $this->pdf;
    }

    /**
     * @param string $filename
     */
    public function deliver(string $filename)
    {
        $this->pdf->Output($filename, 'D');
        exit;
    }
}