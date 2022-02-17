<?php

namespace iit\Application\UI\Element\Content\Paragraph;

use iit\Application\DI\Container;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Standard extends ModuleAbstract
{
    /**
     * @var string
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
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    }
}
