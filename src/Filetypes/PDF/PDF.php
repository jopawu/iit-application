<?php

namespace iit\Application\Filetypes\PDF;

use iit\Application\Filetypes\PDF\Marginal\Horizontal;
use TCPDF;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class PDF extends TCPDF
{
    /**
     * @var Horizontal|null
     */
    protected $firstPageHeader = null;

    /**
     * @var Horizontal|null
     */
    protected $generalPageHeader = null;

    /**
     * @var Horizontal|null
     */
    protected $firstPageFooter = null;

    /**
     * @var Horizontal|null
     */
    protected $generalPageFooter = null;

    /**
     * @return void
     */
    public function __clone()
    {
        if( $this->firstPageHeader !== null )
        {
            $this->firstPageHeader = clone $this->firstPageHeader;
        }

        if( $this->generalPageHeader !== null )
        {
            $this->generalPageHeader = clone $this->generalPageHeader;
        }

        if( $this->firstPageFooter !== null )
        {
            $this->firstPageFooter = clone $this->firstPageFooter;
        }

        if( $this->generalPageFooter !== null )
        {
            $this->generalPageFooter = clone $this->generalPageFooter;
        }
    }

    /**
     * @param Metadata $metadata
     */
    public function applyMetadata(Metadata $metadata)
    {
        $this->pdf->setCreator($metadata->getCreator());
        $this->pdf->setAuthor($metadata->getAuthor());
        $this->pdf->setTitle($metadata->getTitle());
        $this->pdf->setSubject($metadata->getSubject());
        $this->pdf->setKeywords($metadata->getKeywordsString());
    }

    /**
     * @param PageProperties $pageProperties
     */
    public function applyPageProperties(PageProperties $pageProperties)
    {
        $this->setPageFormat(
            $pageProperties->getFormat(),
            $pageProperties->getOrientation()
        );

        $this->setPageUnit($pageProperties->getDistanceUnit());

        $this->setTopMargin($pageProperties->getMarginTop());
        $this->setRightMargin($pageProperties->getMarginRight());
        $this->setBottomMargin($pageProperties->getMarginBottom());
        $this->setLeftMargin($pageProperties->getMarginLeft());

        $this->setHeaderMargin($pageProperties->getMarginHeader());
        $this->setFooterMargin($pageProperties->getMarginFooter());
    }

    /**
     * @param Horizontal $header
     */
    public function setFirstPageHeader(Horizontal $header)
    {
        $this->firstPageHeader = $header;
    }

    /**
     * @param Horizontal $header
     */
    public function setGeneralPageHeader(Horizontal $header)
    {
        $this->generalPageHeader = $header;
    }

    /**
     * @param Horizontal $header
     */
    public function setAllPagesHeader(Horizontal $header)
    {
        $this->firstPageHeader = $header;
        $this->generalPageHeader = $header;
    }

    /**
     * @param Horizontal $footer
     */
    public function setFirstPageFooter(Horizontal $footer)
    {
        $this->firstPageFooter = $footer;
    }

    /**
     * @param Horizontal $footer
     */
    public function setGeneralPageFooter(Horizontal $footer)
    {
        $this->generalPageFooter = $footer;
    }

    /**
     * @param Horizontal $footer
     */
    public function setAllPagesFooter(Horizontal $footer)
    {
        $this->firstPageFooter = $footer;
        $this->generalPageFooter = $footer;
    }

    /**
     * @return void
     */
    public function Header()
    {
        if( $this->PageNo == 1 )
        {
            $this->renderFirstPageHeader();
            return;
        }

        $this->renderGeneralPageHeader();
    }

    /**
     * @return void
     */
    public function Footer()
    {
        if( $this->PageNo == 1 )
        {
            $this->renderFirstPageFooter();
            return;
        }

        $this->renderGeneralPageFooter();
    }

    /**
     * @return void
     */
    protected function renderFirstPageHeader()
    {
        if( $this->firstPageHeader === null )
        {
            return;
        }
    }

    /**
     * @return void
     */
    protected function renderGeneralPageHeader()
    {
        if( $this->generalPageHeader === null )
        {
            return;
        }
    }

    /**
     * @return void
     */
    protected function renderFirstPageFooter()
    {
        if( $this->firstPageFooter === null )
        {
            return;
        }

        $this->SetY(PDF_MARGIN_FOOTER * -1);
        $border = $this->firstPageFooter->getBorder();

        if( $this->firstPageFooter->hasLeftPlacedContent() )
        {
            $content = $this->firstPageFooter->getLeftPlacedContent();
            $this->cell(0,5, $content->get(), $border, 0, 'L');
        }

        if( $this->firstPageFooter->hasCenterPlacedContent() )
        {
            $content = $this->firstPageFooter->getCenterPlacedContent();
            $this->cell(0,5, $content->get(), $border, 0, 'C');
        }

        if( $this->firstPageFooter->hasRightPlacedContent() )
        {
            $content = $this->firstPageFooter->hasRightPlacedContent();
            $this->cell(0,5, $content->get(), $border, 0, 'R');
        }
    }

    /**
     * @return void
     */
    protected function renderGeneralPageFooter()
    {
        if( $this->generalPageFooter === null )
        {
            return;
        }

        $this->SetY(PDF_MARGIN_FOOTER * -1);
        $border = $this->generalPageFooter->getBorder();

        if( $this->generalPageFooter->hasLeftPlacedContent() )
        {
            $content = $this->generalPageFooter->getLeftPlacedContent();
            $this->cell(0,5, $content->get(), $border, 0, 'L');
        }

        if( $this->generalPageFooter->hasCenterPlacedContent() )
        {
            $content = $this->generalPageFooter->getCenterPlacedContent();
            $this->cell(0,5, $content->get(), $border, 0, 'C');
        }

        if( $this->generalPageFooter->hasRightPlacedContent() )
        {
            $content = $this->generalPageFooter->hasRightPlacedContent();
            $this->cell(0,5, $content->get(), $border, 0, 'R');
        }
    }

    /**
     * @return void
     */
    public function myFooter()
    {
        $this->SetY(PDF_MARGIN_FOOTER * -1);

        $pageNumber = $this->getAliasNumPage();
        $pagesTotal = $this->getAliasNbPages();

        $this->writeHTML("Seite <b>{$pageNumber}</b> von {$pagesTotal}",
            true, false, false, false, ''
        );

        return;

        //echo $pageNumber . '/' . $pagesTotal;


        $this->cell(0,5, "Seite {$pageNumber}</b> von {$pagesTotal}",
            0, 0, 'C', false, '', 0, false,
            'T', 'M'
        );
    }
}