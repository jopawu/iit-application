<?php

namespace iit\Application\UI\Formatter;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class LineSplitted extends Formatter
{
    const DEFAULT_SEPARATOR = '|';
    const DEFAULT_SPLITTER = '<br />';

    /**
     * @var string
     */
    protected $separator = self::DEFAULT_SEPARATOR;

    /**
     * @var string
     */
    protected $splitter = self::DEFAULT_SPLITTER;

    /**
     * @param mixed $unbroken
     * @return string
     */
    public function format(mixed $unsplitted): string
    {
        return implode($this->splitter, explode($this->separator, $unsplitted));
    }

    /**
     * @param string $separator
     * @return LineSplitted
     */
    public function withSeparator(string $separator): LineSplitted
    {
        $clone = clone $this;
        $clone->separator = $separator;
        return $clone;
    }

    /**
     * @param string $splitter
     * @return LineSplitted
     */
    public function withSplitter(string $splitter): LineSplitted
    {
        $clone = clone $this;
        $clone->splitter = $splitter;
        return $clone;
    }
}