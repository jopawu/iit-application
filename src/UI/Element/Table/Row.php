<?php

namespace iit\Application\UI\Element\Table;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Row extends ModuleAbstract
{
    /**
     * @var Cell[]
     */
    protected $cells;

    /**
     * @param Container $dic
     * @param Cell[] $cells
     */
    public function __construct(Container $dic, array $cells)
    {
        parent::__construct($dic);

        $this->cells = $cells;
    }

    /**
     * @return Cell[]
     */
    public function getCells() : array
    {
        return $this->cells;
    }
}
