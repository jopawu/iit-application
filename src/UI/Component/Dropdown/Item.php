<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Item extends ModuleAbstract
{
    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $href;

    /**
     * Item constructor.
     * @param string $label
     * @param string $href
     */
    public function __construct(Container $dic, string $label, string $href)
    {
        parent::__construct($dic);
        $this->label = $label;
        $this->href = $href;
    }

    /**
     * @return string
     */
    public function getLabel() : string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getHref() : string
    {
        return $this->href;
    }
}
