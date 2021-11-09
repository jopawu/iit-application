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
        $namespacedClassname = get_class($this);
        return "{$namespacedClassname}Renderer";
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