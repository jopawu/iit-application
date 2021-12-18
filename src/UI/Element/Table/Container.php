<?php

namespace iit\Application\UI\Element\Table;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container as DicContainer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Container extends ModuleAbstract
{
    /**
     * @var Row[]
     */
    protected $bodyRows;

    /**
     * @var Row
     */
    protected $headRow;

    /**
     * @var Row
     */
    protected $footRow;

    /**
     * @param DicContainer $dic
     * @param Row[] $bodyRows
     */
    public function __construct(DicContainer $dic, array $bodyRows)
    {
        parent::__construct($dic);

        $this->bodyRows = $bodyRows;
        $this->headRow = null;
        $this->footRow = null;
    }

    /**
     * @param Row $headRow
     * @return Container
     */
    public function withHeadRow(Row $headRow) : Container
    {
        $clone = clone $this;
        $clone->headRow = $headRow;
        return $clone;
    }

    /**
     * @param Row $footRow
     * @return Container
     */
    public function withFootRow(Row $footRow) : Container
    {
        $clone = clone $this;
        $clone->footRow = $footRow;
        return $clone;
    }

    /**
     * @return Row[]
     */
    public function getBodyRows() : array
    {
        return $this->bodyRows;
    }

    /**
     * @return bool
     */
    public function hasBodyRows() : bool
    {
        return (bool)count($this->bodyRows);
    }

    /**
     * @return Row
     */
    public function getHeadRow() : Row
    {
        return $this->headRow;
    }

    /**
     * @return bool
     */
    public function hasHeadRow() : bool
    {
        return $this->headRow instanceof Row;
    }

    /**
     * @return Row
     */
    public function getFootRow() : ?Row
    {
        return $this->footRow;
    }

    /**
     * @return bool
     */
    public function hasFootRow() : bool
    {
        return $this->footRow instanceof Row;
    }
}
