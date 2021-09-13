<?php

namespace iit\Application\UI\Structure\Content;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @return Page
     */
    public function page()
    {
        return new Page();
    }

    /**
     * @return Snippet
     */
    public function snippet()
    {
        return new Snippet();
    }
}
