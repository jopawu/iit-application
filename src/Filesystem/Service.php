<?php

namespace iit\Application\Filesystem;

use iit\Application\Filesystem\CSV as CsvFile;
use iit\Application\Filesystem\CSV\Reader as CsvReader;
use iit\Application\Filesystem\Directory\Reader as DirReader;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Service
{
    /**
     * @var Container
     */
    protected $dic;

    /**
     * @param Container $dic
     */
    public function __construct(Container $dic)
    {
        $this->dic = $dic;
    }

    /**
     * @param string $filepath
     * @return CsvFile
     */
    public function readCsv(string $filepath) : CsvFile
    {
        $reader = new CsvReader($filepath);
        return new CsvFile($reader->read());
    }

    /**
     * @param string $dirpath
     * @param int $depth
     * @return Directory
     */
    public function readWebDir(string $dirpath, int $depth = 1) : Directory
    {
        $dirpath = "{$this->dic->config()->getApplicationPath()}/{$dirpath}";
        $reader = new DirReader($dirpath, $depth);
        return $reader->read();
    }
}
