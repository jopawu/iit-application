<?php

namespace iit\Application\UI\Layout\Grid;

use iit\Application\Helper\DicTrait;
use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Row extends ModuleAbstract
{
    /**
     * @var Col[]
     */
    protected $columns;

    /**
     * @param Container $dic
     * @param Col[] $columns
     */
    public function __construct(Container $dic, array $columns)
    {
        parent::__construct($dic);
        $this->columns = $columns;
    }

    /**
     * @return Col[]
     */
    public function getColumns() : array
    {
        return $this->columns;
    }
}
