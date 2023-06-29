<?php

namespace iit\Application\UI\Component\Table;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Column\Factory
     */
    public function column() : Column\Factory
    {
        return new Column\Factory($this->dic);
    }

    /**
     * @param array $columns
     * @return ColumnSet
     */
    public function colset(array $columns) : ColumnSet
    {
        return new ColumnSet($columns);
    }

    /**
     * @param array $fields
     * @return DataSet
     */
    public function dataset(array $fields) : DataSet
    {
        return new DataSet($fields);
    }

    /**
     * @param string $title
     * @param ColumnSet $columnSet
     * @return Container
     */
    public function container(string $title, ColumnSet $columnSet) : Container
    {
        return new Container($this->dic, $title, $columnSet);
    }
}
