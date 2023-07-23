<?php

namespace iit\Application\UI\Component\Table\Column;

use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Date extends Column
{
    /**
     * @param Container $dic
     * @param string $identifier
     */
    public function __construct(Container $dic, string $identifier)
    {
        parent::__construct($dic, $identifier);
        $this->formatter = $dic->formatter()->date();
    }
}