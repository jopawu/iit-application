<?php

namespace iit\Application\UI;

use iit\Application\DI\Container;
use iit\Application\Template\WebTemplate;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class Renderer
{
    use Assertion;
    
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
     * @param Module $bar
     * @return string
     */
    abstract function render(Module $bar) : string;

    /**
     * @return WebTemplate
     */
    protected function getTemplate() : WebTemplate
    {
        return new WebTemplate();
    }
}
