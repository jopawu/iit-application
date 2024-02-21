<?php

namespace iit\Application\Filetypes\PDF;

use iit\Application\DI\Container;
use iit\Application\Filetypes\PDF\Marginal\Horizontal;

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

        $this->pdf->SetPrintHeader(true);
        $this->pdf->SetPrintFooter(true);
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
     * @param Metadata $metadata
     * @return $this
     */
    public function withMetadata(Metadata $metadata): static
    {
        $clone = clone $this;
        $clone->pdf->applyMetadata($metadata);
        return $clone;
    }

    /**
     * @param PageProperties $pageProperties
     * @return $this
     */
    protected function withPageProperties(PageProperties $pageProperties): static
    {
        $clone = clone $this;
        $clone->pdf->applyPageProperties($pageProperties);
        return $clone;
    }

    /**
     * @param Horizontal $header
     * @return $this
     */
    public function withFirstPageHeader(Horizontal $header) : static
    {
        $clone = clone $this;
        $clone->pdf->setFirstPageHeader($header);
        return $clone;
    }

    /**
     * @param Horizontal $header
     * @return $this
     */
    public function withGeneralPageHeader(Horizontal $header) : static
    {
        $clone = clone $this;
        $clone->pdf->setGeneralPageHeader($header);
        return $clone;
    }

    /**
     * @param Horizontal $header
     * @return $this
     */
    public function withAllPagesHeader(Horizontal $header) : static
    {
        $clone = clone $this;
        $clone->pdf->setFirstPageHeader($header);
        $clone->pdf->setGeneralPageHeader($header);
        return $clone;
    }

    /**
     * @param Horizontal $footer
     * @return $this
     */
    public function withFirstPageFooter(Horizontal $footer) : static
    {
        $clone = clone $this;
        $clone->pdf->setFirstPageFooter($footer);
        return $clone;
    }

    /**
     * @param Horizontal $footer
     * @return $this
     */
    public function withGeneralPageFooter(Horizontal $footer) : static
    {
        $clone = clone $this;
        $clone->pdf->setGeneralPageFooter($footer);
        return $clone;
    }

    /**
     * @param Horizontal $footer
     * @return $this
     */
    public function withAllPagesFooter(Horizontal $footer) : static
    {
        $clone = clone $this;
        $clone->pdf->setFirstPageFooter($footer);
        $clone->pdf->setGeneralPageFooter($footer);
        return $clone;
    }
}