<?php

namespace iit\Application\UI\Widget\Grid;

use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @var Container
     */
    protected $dic;

    /**
     * @param Container $dic
     */
    public function __construct(Container $dic)
    {
        $this->dic = $dic;
    }

    /**
     * @param string $id
     * @return Table
     */
    public function table($id)
    {
        return new Table($id);
    }
}
