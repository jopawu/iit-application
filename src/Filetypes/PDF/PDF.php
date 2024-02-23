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
        $this->setCreator($metadata->getCreator());
        $this->setAuthor($metadata->getAuthor());
        $this->setTitle($metadata->getTitle());
        $this->setSubject($metadata->getSubject());
        $this->setKeywords($metadata->getKeywordsString());
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
        if( $this->PageNo() == 1 )
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
        if( $this->PageNo() == 1 )
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

        $this->renderPageHeader($this->firstPageHeader);
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

        $this->renderPageHeader($this->generalPageHeader);
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

        $this->renderPageFooter($this->firstPageFooter);
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

        $this->renderPageFooter($this->generalPageFooter);
    }

    /**
     * @param Horizontal $header
     */
    protected function renderPageHeader(Horizontal $header)
    {
        $border = $header->getBorder();

        if( $header->hasLeftPlacedContent() )
        {
            $content = $header->getLeftPlacedContent();
            $this->cell(0,10, $content->get($this), $border, 0, 'L');
        }

        if( $header->hasCenterPlacedContent() )
        {
            $content = $header->getCenterPlacedContent();
            $this->cell(0,10, $content->get($this), $border, 0, 'C');
        }

        if( $header->hasRightPlacedContent() )
        {
            $content = $header->getRightPlacedContent();
            $this->cell(0,10, $content->get($this), $border, 0, 'R');
        }
    }

    /**
     * @param Horizontal $footer
     */
    protected function renderPageFooter(Horizontal $footer)
    {
        $this->SetY(PDF_MARGIN_FOOTER * -1);
        $border = $footer->getBorder();

        if( $footer->hasLeftPlacedContent() )
        {
            $content = $footer->getLeftPlacedContent();
            $this->cell(0,5, $content->get($this), $border, 0, 'L');
        }

        if( $footer->hasCenterPlacedContent() )
        {
            $content = $footer->getCenterPlacedContent();
            $this->cell(0,5, $content->get($this), $border, 0, 'C');
        }

        if( $footer->hasRightPlacedContent() )
        {
            $content = $footer->getRightPlacedContent();
            $this->cell(0,5, $content->get($this), $border, 0, 'R');
        }
    }
}