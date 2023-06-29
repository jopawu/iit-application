<?php

namespace iit\Application\Filesystem;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class Item
{
    /**
     * @var string
     */
    protected $dirpath;

    /**
     * @var string
     */
    protected $filename;

    /**
     * @var int
     */
    protected $lastModified;

    /**
     * @var int
     */
    protected $size;

    /**
     * @param string $dirpath
     * @param string $filename
     */
    public function __construct(string $dirpath, string $filename)
    {
        $this->dirpath = $dirpath;
        $this->filename = $filename;

        $statistics = stat("{$dirpath}/{$filename}");
        $this->lastModified = $statistics['mtime'];
        $this->size = $statistics['size'];
    }

    /**
     * @return string
     */
    public function getDirpath() : string
    {
        return $this->dirpath;
    }

    /**
     * @return string
     */
    public function getFilename() : string
    {
        return $this->filename;
    }

    /**
     * @return int
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }
}
