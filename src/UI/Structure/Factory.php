<?php

namespace iit\Application\UI\Structure;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @return Content\Factory
     */
    public function content()
    {
        return new Content\Factory();
    }

    /**
     * @return Document\Factory
     */
    public function document()
    {
        return new Document\Factory();
    }
}
