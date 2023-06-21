<?php

namespace iit\Application\UI\Component\Glyph;

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
     * @return Item\Factory
     */
    public function item() : Item\Factory
    {
        return new Item\Factory($this->dic);
    }

    /**
     * @return Chevron\Factory
     */
    public function chevron() : Chevron\Factory
    {
        return new Chevron\Factory($this->dic);
    }
}