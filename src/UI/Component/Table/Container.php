<?php

namespace iit\Application\UI\Component\Table;

use iit\Application\DI\Container as DIC;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Container extends ModuleAbstract
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var ColumnSet
     */
    protected $columnSet;

    /**
     * @var DataSet[]
     */
    protected $dataSets;

    /**
     * @param DIC $dic
     * @param string $title
     * @param ColumnSet $columnSet
     */
    public function __construct(DIC $dic, string $title, ColumnSet $columnSet)
    {
        parent::__construct($dic);

        $this->title = $title;
        $this->columnSet = $columnSet;
        $this->dataSets = [];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function hasTitle(): bool
    {
        return strlen($this->title);
    }

    /**
     * @return ColumnSet
     */
    public function getColumnSet(): ColumnSet
    {
        return $this->columnSet;
    }

    /**
     * @return array|DataSet[]
     */
    public function getDataSets(): array
    {
        return $this->dataSets;
    }

    /**
     * @param DataSet $dataSet
     * @return Container
     */
    public function withDataSetAdded(DataSet $dataSet): Container
    {
        $clone = clone $this;
        $clone->dataSets[] = $dataSet;
        return $clone;
    }
}