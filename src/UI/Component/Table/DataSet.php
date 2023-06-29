<?php

namespace iit\Application\UI\Component\Table;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class DataSet implements \Iterator
{
    /**
     * @var array
     */
    protected $fields = [];

    /**
     * @param array $fields
     */
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return false|array|mixed
     */
    public function current()
    {
        return current($this->fields);
    }

    /**
     * @return false|array|void
     */
    public function next()
    {
        return next($this->fields);
    }

    /**
     * @return int|mixed|string|null
     */
    public function key()
    {
        return key($this->fields);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return key($this->fields) !== null;
    }

    /**
     * @return false|array|void
     */
    public function rewind()
    {
        return reset($this->fields);
    }
}