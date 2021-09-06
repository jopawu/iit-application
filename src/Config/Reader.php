<?php

namespace iit\Application\Config;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Reader
{
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

    public function read()
    {
        $this->checkFile();

        $iniSections = parse_ini_file($this->filename, true);

        if( $iniSections === false )
        {
            throw new \InvalidArgumentException("could not parse config file: {$this->filename}");
        }

        return $iniSections;
    }

    protected function checkFile()
    {
        if( !file_exists($this->filename) )
        {
            throw new \InvalidArgumentException("config file does not exist: {$this->filename}");
        }

        if( !is_file($this->filename) )
        {
            throw new \InvalidArgumentException("config file is not a file: {$this->filename}");
        }

        if( !is_readable($this->filename) )
        {
            throw new \InvalidArgumentException("config file is not readable: {$this->filename}");
        }
    }
}
