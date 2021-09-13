<?php

namespace iit\Application\UI\Structure\Document;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @return Xhtml
     */
    public function xhtml()
    {
        return new Xhtml();
    }
}
