<?php

namespace iit\Application\Filesystem\CSV;

use iit\Application\Filesystem\CSV;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Writer
{
    const SEPARATOR = ";";

    /**
     * @var string
     */
    protected $filename;

    /**
     * @param string $filename
     * @param CSV $csv
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    /**
     * @param CSV $csv
     */
    public function write(CSV $csv)
    {
        $this->checkFile();

        $handle = fopen($this->filename, "w");

        if( $handle === false )
        {
            throw new \InvalidArgumentException("could not open csv file for reading: {$this->filename}");
        }

        foreach($csv as $dataset)
        {
            fputcsv($handle, $dataset, self::SEPARATOR);
        }

        fclose($handle);
    }

    protected function checkFile()
    {
        if( file_exists($this->filename) )
        {
            if( is_dir($this->filename) )
            {
                throw new \InvalidArgumentException("a file with same name allready exists: {$this->filename}");
            }

            throw new \InvalidArgumentException("a file with same name allready exists: {$this->filename}");
        }

        $parentDirectory = dirname($this->filename);

        if( !file_exists($parentDirectory) )
        {
            throw new \InvalidArgumentException("target directory does not exist: {$parentDirectory}");
        }

        if( !is_writeable($parentDirectory) )
        {
            throw new \InvalidArgumentException("missing write permission on target directory: {$parentDirectory}");
        }
    }
}