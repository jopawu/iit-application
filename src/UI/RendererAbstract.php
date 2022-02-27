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

    /**
     * @param WebTemplate    $template
     * @param ModuleAbstract $module
     */
    protected function renderCssClasses(WebTemplate $template, ModuleAbstract $module)
    {
        $template->assign('CSS_CLASSES', implode(' ', $module->getCssClasses()));
    }

    /**
     * @param WebTemplate    $template
     * @param ModuleAbstract $module
     */
    protected function renderAttributes(WebTemplate $template, ModuleAbstract $module)
    {
        $attributes = [];

        foreach($module->getAttributes() as $attrName => $attrValue)
        {
            $attributes[] = $attrName.'="'.$attrValue.'"';
        }

        $template->assign('ATTRIBUTES', implode(' ', $attributes));
    }
}
