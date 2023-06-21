<?php

namespace iit\Application\UI\Component;

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
     * @return Form\Factory
     */
    public function form() : Form\Factory
    {
        return new Form\Factory($this->dic);
    }

    /**
     * @return Glyph\Factory
     */
    public function glyph() : Glyph\Factory
    {
        return new Glyph\Factory($this->dic);
    }

    /**
     * @return Dropdown\Factory
     */
    public function dropdown() : Dropdown\Factory
    {
        return new Dropdown\Factory($this->dic);
    }

    /**
     * @return Navbar\Factory
     */
    public function navbar() : Navbar\Factory
    {
        return new Navbar\Factory($this->dic);
    }

    /**
     * @return Tabs\Factory
     */
    public function tabs() : Tabs\Factory
    {
        return new Tabs\Factory($this->dic);
    }

    /**
     * @return Presentation\Factory
     */
    public function presentation() : Presentation\Factory
    {
        return new Presentation\Factory($this->dic);
    }

    /**
     * @return Confirmation
     */
    public function confirmation() : Confirmation
    {
        return new Confirmation($this->dic);
    }


}
