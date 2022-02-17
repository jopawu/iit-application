<?php

namespace iit\Application\UI\Component;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ConfirmationRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Confirmation.html';

    /**
     * @param ModuleAbstract $confirmation
     * @return string
     */
    public function render(ModuleAbstract $confirmation) : string
    {
        /* @var Confirmation $confirmation */
        $this->assertInstanceOf($confirmation, [Confirmation::class]);

        $template = $this->getTemplate();

        $template->assign('CONTENT', $this->getRenderedContents($confirmation));
        $template->assign('COMMANDS', $this->getRenderedCommands($confirmation));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Confirmation $confirmation
     * @return string
     */
    protected function getRenderedContents(Confirmation $confirmation) : string
    {
        $renderedContents = [];

        foreach($confirmation->getContents() as $content)
        {
            $renderedContents[] = $content->render();
        }

        return implode("\n", $renderedContents);
    }

    /**
     * @param Confirmation $confirmation
     * @return string
     */
    protected function getRenderedCommands(Confirmation $confirmation) : string
    {
        $confirmButton = $this->dic->ui()->element()->navigation()->button(
            $confirmation->getConfirmLabel(), (string)$confirmation->getConfirmLink()
        )->withPrimaryState();

        $cancelButton = $this->dic->ui()->element()->navigation()->button(
            $confirmation->getCancelLabel(), (string)$confirmation->getCancelLink()
        )->withPrimaryState();

        $navbar = $this->dic->ui()->component()->navbar()->bar([
            $this->dic->ui()->component()->navbar()->nav($confirmButton),
            $this->dic->ui()->component()->navbar()->nav($cancelButton)
        ]);

        return $navbar->render();
    }
}
