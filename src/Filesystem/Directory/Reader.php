<?php

namespace iit\Application\Filesystem\Directory;

use iit\Application\Filesystem\Directory;
use iit\Application\Filesystem\File;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Reader
{
    /**
     * @var string
     */
    protected $dirpath;

    /**
     * @var int
     */
    protected $depth;

    /**
     * @param string $dirpath
     * @param int $depth
     */
    public function __construct(string $dirpath, int $depth)
    {
        $dirpath = rtrim($dirpath, PATH_SEPARATOR);
        self::checkDir($dirpath);

        $this->dirpath = $dirpath;
        $this->depth = $depth;
    }

    /**
     * @return Directory
     */
    public function read() : Directory
    {
        $directory = new Directory(dirname($this->dirpath), basename($this->dirpath));
        self::initDirectory($directory, $this->dirpath, $this->depth);
        return $directory;
    }

    /**
     * @param Directory $directory
     * @param string $dirpath
     * @param int $depth
     */
    protected static function initDirectory(Directory $directory, string $dirpath, int $depth)
    {
        --$depth;

        $handle = opendir($dirpath);

        if( $handle )
        {
            while( $itemname = readdir($handle) )
            {
                if( $itemname == "." || $itemname == ".." )
                {
                    continue;
                }

                $itempath = "{$dirpath}/{$itemname}";

                if( filetype($itempath) === 'dir' )
                {
                    $subDir = new Directory($dirpath, $itemname);
                    $directory->addChild($subDir);

                    if( !$depth )
                    {
                        continue;
                    }

                    clearstatcache();
                    self::initDirectory($subDir, $itempath, $depth);

                    continue;
                }

                $file = new File($dirpath, $itemname);
                $directory->addChild($file);
            }

            closedir($handle);
        }
    }

    protected static function checkDir(string $dirpath)
    {
        if( !file_exists($dirpath) )
        {
            throw new \InvalidArgumentException("directory does not exist: {$dirpath}");
        }

        if( !is_dir($dirpath) )
        {
            throw new \InvalidArgumentException("directory is not a directory: {$dirpath}");
        }

        if( !is_readable($dirpath) )
        {
            throw new \InvalidArgumentException("directory is not readable: {$dirpath}");
        }
    }
}
