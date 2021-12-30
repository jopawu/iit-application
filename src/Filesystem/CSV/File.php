<?php

namespace iit\Application\Filesystem\CSV;

use Iterator;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class File implements Iterator
{
    /**
     * @var array
     */
    protected $rows;

    /**
     * @param array $rows
     */
    public function __construct(array $rows)
    {
        $this->rows = $rows;
    }


    /**
     * @return array
     */
    public function current() : ?array
    {
        return current($this->rows);
    }

    /**
     * @return array
     */
    public function next() : ?array
    {
        return next($this->rows);
    }

    /**
     * @return int
     */
    public function key() : int
    {
        return key($this->rows);
    }

    /**
     * @return bool
     */
    public function valid() : bool
    {
        return key($this->rows) !== null;
    }

    /**
     * @return array
     */
    public function rewind() : ?array
    {
        return reset($this->rows);
    }
}
