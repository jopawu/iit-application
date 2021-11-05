<?php

namespace iit\Application\UI\XHTML;

use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
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
     * @param string $content
     * @return Snippet
     */
    public function snippet($content)
    {
        return new Snippet($this->dic, $content);
    }

    /**
     * @return Document
     */
    public function document()
    {
        return new Document($this->dic);
    }
}
