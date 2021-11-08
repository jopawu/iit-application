<?php

namespace iit\Application\UI;

use iit\Application\DI\Container;

class ModuleAbstract implements ModuleAware
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
     * @return string
     */
    protected function buildRendererClassname() : string
    {
        $namespacePathStack = explode("\\", get_class($this));

        $moduleClassname = array_pop($namespacePathStack);
        $moduleNamespace = implode("\\", $namespacePathStack);

        return "{$moduleNamespace}\\Renderer\\{$moduleClassname}";
    }

    /**
     * @return string
     */
    public function render() : string
    {
        $rendererClassname = $this->buildRendererClassname();
        $renderer = new $rendererClassname($this->dic);
        return $renderer->render($this);
    }
}