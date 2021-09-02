<?php

namespace iit\Application\Config;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Config
{
    /**
     * @var array
     */
    protected $iniSections;
    
    /**
     * @param string $filename
     */
    protected function read($filename)
    {
        $reader = new Reader($filename);
        $this->sections = $reader->read();
    }

    /**
     * @param string $section
     * @param string $variable
     * @return string
     */
    public function getVariable($section, $variable)
    {
        $this->checkVariable($section, $variable);
        return $this->iniSections[$section][$variable];
    }

    /**
     * @param string $section
     * @param string $variable
     */
    protected function checkVariable($section, $variable)
    {
        if( !isset($this->iniSections[$section]) )
        {
            throw new \InvalidArgumentException("ini section does not exist: {$section}");
        }

        if( !isset($this->iniSections[$section][$variable]) )
        {
            throw new \InvalidArgumentException("ini variable does not exist: {$variable}");
        }
    }

    /**
     * @param string $filename
     * @return Config
     */
    public static function fromFile($filename)
    {
        $config = new self();
        $config->read($filename);
        return $config;
    }
}
