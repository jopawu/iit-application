<?php

namespace iit\Application\UI\Component\Table;

use iit\Application\UI\Component\Table\Column\Column;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ColumnSet implements \Iterator
{
    /**
     * @var Column[]
     */
    protected $colums = [];

    /**
     * @param array $columns
     */
    public function __construct(array $columns)
    {
        $this->checkColumns($columns);
        $this->colums = $columns;
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function checkColumns(array $columns)
    {
        foreach ($columns as $column)
        {
            if ($column instanceof Column)
            {
                continue;
            }

            throw new \InvalidArgumentException('invalid column definition given');
        }
    }

    /**
     * @param $identifier
     * @return false|Column|mixed
     */
    public function getColumn($identifier)
    {
        foreach($this as $column)
        {
            if( $column->getIdentifier() != $identifier )
            {
                continue;
            }

            return $column;
        }

        throw new InvalidArgumentException(
            "column with identifier '{$identifier}' does not exist"
        );
    }

    /**
     * @return false|Column|mixed
     */
    public function current()
    {
        return current($this->colums);
    }

    /**
     * @return false|Column|void
     */
    public function next()
    {
        return next($this->colums);
    }

    /**
     * @return int|mixed|string|null
     */
    public function key()
    {
        return key($this->colums);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return key($this->colums) !== null;
    }

    /**
     * @return false|Column|void
     */
    public function rewind()
    {
        return reset($this->colums);
    }
}