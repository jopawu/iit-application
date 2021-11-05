<?php

namespace iit\Application\UI\XHTML;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @return Document
     */
    public function body()
    {
        return new Body();
    }

    /**
     * @return Document
     */
    public function document()
    {
        return new Document();
    }
}
