<?php

namespace iit\Application\UI\Layout\Grid;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param Col[] $columns
     * @return Row
     */
    public function row(array $columns) : Row
    {
        return new Row($this->dic, $columns);
    }

    /**
     * @param string $content
     * @return Col
     */
    public function col(string $content) : Col
    {
        return new Col($this->dic, $content);
    }
}
