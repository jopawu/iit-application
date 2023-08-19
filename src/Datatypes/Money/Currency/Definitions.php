<?php

namespace iit\Application\Datatypes\Money\Currency;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Definitions
{
    const PATH_ISO = 'bheyser/money-currencies-db/config/currency_iso.json';
    const PATH_NON_ISO = 'bheyser/money-currencies-db/config/currency_non_iso.json';
    const PATH_BACKWARDS = 'bheyser/money-currencies-db/config/currency_backwards_compatible.json';

    const TYPE_REAL = 'real';
    const TYPE_CRYPTO = 'crypto';
    const TYPE_BACKWARDS = 'backwards';

    /**
     * @var array
     */
    protected static $definitions = [];

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $vendorPath;

    /**
     * @param string $type
     * @param string $vendorPath
     */
    public function __construct(string $type, string $vendorPath)
    {
        $this->type = $type;
        $this->vendorPath = $vendorPath;
    }

    /**
     */
    protected function loadDefinitions()
    {
        if( isset(self::$definitions[$this->type]) )
        {
            return;
        }

        switch($this->type)
        {
            case self::TYPE_REAL:
                $filePath = $this->vendorPath . '/' . self::PATH_ISO;
                break;

            case self::TYPE_CRYPTO:
                $filePath = $this->vendorPath . '/' . self::PATH_NON_ISO;
                break;

            case self::TYPE_BACKWARDS:
                $filePath = $this->vendorPath . '/' . self::PATH_BACKWARDS;
                break;

            default: throw new \InvalidArgumentException(
                "invalid currencies type given: {$this->type}"
            );
        }

        $fileContent = file_get_contents($filePath);

        self::$definitions[$this->type] = json_decode($fileContent, true);
    }

    /**
     * @param string $code
     * @return array
     */
    public function getProperties(string $code) : array
    {
        $this->loadDefinitions();

        foreach(self::$definitions[$this->type] as $properties)
        {
            if( $properties['iso_code'] != $code )
            {
                continue;
            }

            return $properties;
        }

        throw new \InvalidArgumentException(
            "invalid iso code given: {$code}"
        );
    }
}