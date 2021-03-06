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

    const CLASS_SUBMIT_ROW = 'formSubmitRow';

    /**
     * @param ModuleAbstract $container
     * @return string
     */
    public function render(ModuleAbstract $container) : string
    {
        /* @var Container $container */
        $this->assertInstanceOf($container, [Container::class]);

        $template = $this->getTemplate();

        $this->renderCssClasses($template, $container);

        $template->assign('ID', $container->getId());
        $template->assign('NAME', $container->getName());
        $template->assign('LABEL', $container->getLabel());
        $template->assign('ACTION', $container->getAction());

        $template->assign('FIELDSETS', $this->getRenderedSections($container));

        $template->assign('HIDDENS', $this->getRenderedHiddens($container));
        $template->assign('SUBMITS', $this->getRenderedSubmits($container));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Container $container
     * @return string[]
     */
    protected function getRenderedSections(Container $container) : array
    {
        $renderedSections = [];

        foreach($container->getSections() as $fieldset)
        {
            $renderedSections[] = $fieldset->render();
        }

        return $renderedSections;
    }

    /**
     * @param Container $container
     * @return string
     */
    protected function getRenderedHiddens(Container $container) : string
    {
        $hiddens = [];

        foreach($container->getHiddenParameters() as $paramName => $paramValue)
        {
            $hiddens[] = $this->dic->ui()->element()->form()->hidden($paramName, $paramValue)->render();
        }

        return implode("\n", $hiddens);
    }

    /**
     * @param Container $container
     * @return string
     */
    protected function getRenderedSubmits(Container $container) : string
    {
        $submitCols = [];

        foreach($container->getSubmits() as $submit)
        {
            $submitCols[] = $this->dic->ui()->layout()->grid()->col($submit->render())
                                                              ->withAutoWidth();
        }

        $row = $this->dic->ui()->layout()->grid()->row($submitCols)
                                                 ->withCssClassAdded(self::CLASS_SUBMIT_ROW);

        return $row->render();
    }
}
