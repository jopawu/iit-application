<?php

namespace iit\Application\UI\Element\Content\Image;

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
     * @param string $src
     * @return Standard
     */
    public function standard(string $src) : Standard
    {
        return new Standard($this->dic, $src);
    }

    /**
     * @param string $src
     * @return Thumbnail
     */
    public function thumbnail(string $src) : Thumbnail
    {
        return new Thumbnail($this->dic, $src);
    }

    /**
     * @param string $src
     * @return RoundedPill
     */
    public function roundedPill(string $src) : RoundedPill
    {
        return new RoundedPill($this->dic, $src);
    }
}
