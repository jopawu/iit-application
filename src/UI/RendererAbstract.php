<?php

namespace iit\Application\UI;

use iit\Application\DI\Container;
use iit\Application\Template\WebTemplate;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class RendererAbstract implements RendererAware
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
     * @param ModuleAbstract $module
     * @return string
     */
    abstract public function render(ModuleAbstract $module) : string;

    /**
     * @return WebTemplate
     */
    protected function getTemplate() : WebTemplate
    {
        return new WebTemplate();
    }
}
