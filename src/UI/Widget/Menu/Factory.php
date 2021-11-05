<?php

namespace iit\Application\UI\Widget\Menu;

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
     * @return Menu
     */
    public function list($id)
    {
        return new Menu($id);
    }

    /**
     * @param string $type
     * @param string $label
     * @return Entry
     */
    public function entry($type, $label)
    {
        return new Entry($type, $label);
    }
}
