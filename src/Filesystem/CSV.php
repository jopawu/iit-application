<?php

namespace iit\Application\Filesystem;

use Iterator;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class CSV implements Iterator
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
    public function current()
    {
        return current($this->rows);
    }

    /**
     * @return array
     */
    public function next()
    {
        return next($this->rows);
    }

    /**
     * @return int
     */
    public function key()
    {
        return key($this->rows);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return key($this->rows) !== null;
    }

    /**
     * @return array
     */
    public function rewind()
    {
        return reset($this->rows);
    }
}
