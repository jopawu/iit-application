<?php

namespace iit\Application\UI;

use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class Renderer
{
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
     * @param Module $module
     * @return string
     */
    abstract function render(Module $module) : string;

    /**
     * @param Module $module
     * @param string $assertionClassname
     * @throws \InvalidArgumentException
     */
    protected function assertInstanceOf($module, $assertionClassname)
    {
        $moduleClassname = get_class($module);

        if( $moduleClassname != $assertionClassname )
        {
            throw new \InvalidArgumentException(
                "invalid ui module given: {$moduleClassname}, required one: {$assertionClassname}"
            );
        }
    }
}
