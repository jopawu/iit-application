<?php

namespace iit\Application\UI\Component\Form;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ContainerRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Form/container.html';
    /**
     * @param ModuleAbstract $container
     * @return string
     */
    public function render(ModuleAbstract $container) : string
    {
        /* @var Container $container */
        $this->assertInstanceOf($container, [Container::class]);

        $template = $this->getTemplate();

        $template->assign('ID', $container->getId());
        $template->assign('NAME', $container->getName());
        $template->assign('LABEL', $container->getLabel());
        $template->assign('ACTION', $container->getAction());

        $template->assign('FIELDSETS', $this->getRenderedFieldsets($container));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Container $container
     * @return string[]
     */
    protected function getRenderedFieldsets(Container $container) : array
    {
        $renderedFieldsets = [];

        foreach($container->getFieldsets() as $fieldset)
        {
            $renderedFieldsets[] = $fieldset->render();
        }

        return $renderedFieldsets;
    }
}
