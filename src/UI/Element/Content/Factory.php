<?php

namespace iit\Application\UI\Element\Content;

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
     * @return Image\Factory
     */
    public function image() : Image\Factory
    {
        return new Image\Factory($this->dic);
    }

    /**
     * @return Listing\Factory
     */
    public function listing() : Listing\Factory
    {
        return new Listing\Factory($this->dic);
    }
}
