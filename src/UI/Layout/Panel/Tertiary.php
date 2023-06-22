<?php

namespace iit\Application\UI\Layout\Panel;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Tertiary extends ModuleAbstract
{
    /**
     * @var
     */
    protected $content;

    /**
     * @param Container $dic
     * @param string    $content
     */
    public function __construct(Container $dic, string $content)
    {
        parent::__construct($dic);
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent() : string
    {
        return $this->content;
    }
}
