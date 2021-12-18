<?php

namespace iit\Application\UI\Element\Table;

use iit\Application\DI\Container as DicContainer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @var DicContainer
     */
    protected $dic;

    /**
     * @param DicContainer $dic
     */
    public function __construct(DicContainer $dic)
    {
        $this->dic = $dic;
    }

    /**
     * @param Row[] $bodyRows
     * @return Container
     */
    public function container(array $bodyRows) : Container
    {
        return new Container($this->dic, $bodyRows);
    }

    /**
     * @param Cell[] $cells
     * @return Row
     */
    public function row(array $cells) : Row
    {
        return new Row($this->dic, $cells);
    }

    /**
     * @param string $content
     * @param bool $isHeaderCell
     * @return Cell
     */
    public function cell(string $content, bool $isHeaderCell = false) : Cell
    {
        return new Cell($this->dic, $content, $isHeaderCell);
    }
}
