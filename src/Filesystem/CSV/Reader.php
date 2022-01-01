<?php

namespace iit\Application\Filesystem\CSV;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Reader
{
    const SEPARATOR = ";";

    /**
     * @var string
     */
    protected $filename;

    /**
     * @param string $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return array
     */
    public function read() : array
    {
        $this->checkFile();

        $handle = fopen($this->filename, "r");

        if( $handle === false )
        {
            throw new \InvalidArgumentException("could not open csv file: {$this->filename}");
        }

        $rows = [];

        while( $row = fgetcsv($handle, 0, self::SEPARATOR) )
        {
            $rows[] = $row;
        }

        fclose($handle);

        return $rows;
    }

    protected function checkFile()
    {
        if( !file_exists($this->filename) )
        {
            throw new \InvalidArgumentException("csv file does not exist: {$this->filename}");
        }

        if( !is_file($this->filename) )
        {
            throw new \InvalidArgumentException("csv file is not a file: {$this->filename}");
        }

        if( !is_readable($this->filename) )
        {
            throw new \InvalidArgumentException("csv file is not readable: {$this->filename}");
        }
    }

}
