<?php

namespace iit\Application\UI\Element\Table;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Cell extends ModuleAbstract
{
    /**
     * @var string
     */
    protected $content;

    /**
     * @var bool
     */
    protected $isHeaderCell;

    /**
     * @param Container $dic
     * @param string    $content
     */
    public function __construct(Container $dic, string $content, bool $isHeaderCell)
    {
        parent::__construct($dic);

        $this->content = $content;
        $this->isHeaderCell = $isHeaderCell;
    }

    /**
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    }

    /**
     * @return bool
     */
    public function isHeaderCell() : bool
    {
        return $this->isHeaderCell;
    }
}
