<?php

namespace iit\Application\Filesystem;

use Iterator;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Directory extends Item implements Iterator
{
    /**
     * @var Item[]
     */
    protected $children;

    /**
     * @param string $dirpath
     * @param string $filename
     */
    public function __construct(string $dirpath, string $filename)
    {
        parent::__construct($dirpath, $filename);
        $this->children = [];
    }

    /**
     * @param Item $child
     */
    public function addChild(Item $child)
    {
        $this->children[] = $child;
    }

    /**
     * @return Item
     */
    public function current()
    {
        return current($this->children);
    }

    /**
     * @return Item
     */
    public function next()
    {
        return next($this->children);
    }

    /**
     * @return int
     */
    public function key()
    {
        return key($this->children);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return key($this->children) !== null;
    }

    /**
     * @return Item
     */
    public function rewind()
    {
        return reset($this->children);
    }

    /**
     * @param string $regex
     * @return Directory
     */
    public function getRegexFilteredDirectory(string $regex) : Directory
    {
        $filteredDirectory = new Directory($this->getDirpath(), $this->getFilename());

        foreach($this as $item)
        {
            if( !preg_match($regex, $item->getFilename()) )
            {
                continue;
            }

            $filteredDirectory->addChild($item);
        }

        return $filteredDirectory;
    }
}
