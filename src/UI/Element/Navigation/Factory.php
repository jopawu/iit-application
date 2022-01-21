<?php

namespace iit\Application\UI\Element\Navigation;

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
     * @param string $label
     * @param string $href
     * @return Link
     */
    public function link(string $label, string $href) : Link
    {
        return new Link($this->dic, $label, $href);
    }

    /**
     * @param string $label
     * @param string $href
     * @return Button
     */
    public function button(string $label, string $href) : Button
    {
        return new Button($this->dic, $label, $href);
    }
}
