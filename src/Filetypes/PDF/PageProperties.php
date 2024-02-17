<?php

namespace iit\Application\Filetypes\PDF;

class PageProperties
{
    const FORMAT_DIN_A4 = 'A4';

    const ORIENTATION_PORTRAIT = 'P';
    const ORIENTATION_LANDSCAPE = 'L';

    const DISTANCE_UNIT_MILLIMETER = 'mm';
    const DISTANCE_UNIT_CENTIMETER = 'cm';
    const DISTANCE_UNIT_INCH = 'in';
    const DISTANCE_UNIT_POINT = 'pt';

    /**
     * @var string
     */
    protected $format = self::FORMAT_DIN_A4;

    /**
     * @var string
     */
    protected $orientation = self::FORMAT_DIN_A4;

    /**
     * @var string
     */
    protected $distanceUnit = self::DISTANCE_UNIT_MILLIMETER;

    /**
     * @var int
     */
    protected $marginTop = PDF_MARGIN_TOP;

    /**
     * @var int
     */
    protected $marginRight = PDF_MARGIN_RIGHT;

    /**
     * @var int
     */
    protected $marginBottom = PDF_MARGIN_BOTTOM;

    /**
     * @var int
     */
    protected $marginLeft = PDF_MARGIN_LEFT;

    /**
     * @var int
     */
    protected $marginHeader = PDF_MARGIN_HEADER;

    /**
     * @var int
     */
    protected $marginFooter = PDF_MARGIN_FOOTER;

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @return string
     */
    public function getOrientation(): string
    {
        return $this->orientation;
    }

    /**
     * @return string
     */
    public function getDistanceUnit(): string
    {
        return $this->distanceUnit;
    }

    /**
     * @return int
     */
    public function getMarginTop(): int
    {
        return $this->marginTop;
    }

    /**
     * @return int
     */
    public function getMarginRight(): int
    {
        return $this->marginRight;
    }

    /**
     * @return int
     */
    public function getMarginBottom(): int
    {
        return $this->marginBottom;
    }

    /**
     * @return int
     */
    public function getMarginLeft(): int
    {
        return $this->marginLeft;
    }

    /**
     * @return int
     */
    public function getMarginHeader(): int
    {
        return $this->marginHeader;
    }

    /**
     * @return int
     */
    public function getMarginFooter(): int
    {
        return $this->marginFooter;
    }

    /**
     * @param string $format
     * @return Page
     */
    public function withFormat(string $format): Page
    {
        $clone = clone $this;
        $clone->format = $format;
        return $clone;
    }

    /**
     * @param string $orientation
     * @return Page
     */
    public function withOrientation(string $orientation): Page
    {
        $clone = clone $this;
        $clone->orientation = $orientation;
        return $clone;
    }

    /**
     * @param string $distanceUnit
     * @return Page
     */
    public function withDistanceUnit(string $distanceUnit): Page
    {
        $clone = clone $this;
        $clone->distanceUnit = $distanceUnit;
        return $clone;
    }

    /**
     * @param string $marginTop
     * @return Page
     */
    public function withMarginTop(string $marginTop): Page
    {
        $clone = clone $this;
        $clone->marginTop = $marginTop;
        return $clone;
    }

    /**
     * @param string $marginRight
     * @return Page
     */
    public function withMarginRight(string $marginRight): Page
    {
        $clone = clone $this;
        $clone->marginRight = $marginRight;
        return $clone;
    }

    /**
     * @param string $marginBottom
     * @return Page
     */
    public function withMarginBottom(string $marginBottom): Page
    {
        $clone = clone $this;
        $clone->marginBottom = $marginBottom;
        return $clone;
    }

    /**
     * @param string $marginLeft
     * @return Page
     */
    public function withMarginLeft(string $marginLeft): Page
    {
        $clone = clone $this;
        $clone->marginLeft = $marginLeft;
        return $clone;
    }

    /**
     * @param string $marginHeader
     * @return Page
     */
    public function withMarginHeader(string $marginHeader): Page
    {
        $clone = clone $this;
        $clone->marginHeader = $marginHeader;
        return $clone;
    }

    /**
     * @param string $marginFooter
     * @return Page
     */
    public function withMarginFooter(string $marginFooter): Page
    {
        $clone = clone $this;
        $clone->marginFooter = $marginFooter;
        return $clone;
    }
}