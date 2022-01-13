<?php

namespace iit\Application\UI\Layout;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Page\Factory
     */
    public function page()
    {
        return new Page\Factory($this->dic);
    }

    /**
     * @return Panel\Factory
     */
    public function panel()
    {
        return new Panel\Factory($this->dic);
    }

    /**
     * @return Grid\Factory
     */
    public function grid() : Grid\Factory
    {
        return new Grid\Factory($this->dic);
    }
}
