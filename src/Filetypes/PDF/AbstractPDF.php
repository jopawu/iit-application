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
     * @param Metadata $metadata
     * @param PageProperties $pageProperties
     */
    public function __construct(
        Container $dic,
        Metadata $metadata,
        PageProperties $pageProperties
    )
    {
        $this->dic = $dic;

        $this->pdf = new PDF(
            $pageProperties->getFormat(),
            $pageProperties->getDistanceUnit(),
            $pageProperties->getOrientation(),
            true,
            'UTF-8',
            false
        );

        $this->pdf->applyMetadata($metadata);
        $this->pdf->applyPageProperties($pageProperties);

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

    /**
     * @param PageProperties $pageProperties
     */
    protected function withPageProperties(PageProperties $pageProperties)
    {
        $clone = clone $this;
        $clone->pdf->applyPageProperties($pageProperties);
        return $clone;
    }

    /**
     * @param Metadata $metadata
     * @return $this
     */
    public function withMetadata(Metadata $metadata): static
    {
        $clone = clone $this;
        $clone->pdf->applyMetadata($metadata);
        return $clone;
    }
}