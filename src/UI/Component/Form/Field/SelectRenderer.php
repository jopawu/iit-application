<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class SelectRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Form/Field/select.html';

    const CSS_CLASS_CHEVRON_DOWN = 'chevron-down-glyph';
    const CSS_CLASS_CHEVRON_UP = 'chevron-up-glyph';

    /**
     * @param ModuleAbstract $field
     * @return string
     */
    public function render(ModuleAbstract $field) : string
    {
        /* @var Select $field */
        $this->assertInstanceOf($field, [Select::class]);

        $this->dic->doc()->addJqueryChosen();

        $template = $this->getTemplate();

        $template->assign('ID', $field->getId());
        $template->assign('LABEL', $field->getLabel() . $chev);
        $template->assign('SELECT', $this->renderSelect($field));
        $template->assign('GLYPHS_HTML', $this->getChevronGlyphsHtml());

        $optSearchDisabled = $field->isSearchEnabled() ? 'false' : 'true';
        $template->assign('OPT_SEARCH_ENABLED', $optSearchDisabled);

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Select $field
     * @return string
     */
    protected function renderSelect(Select $field) : string
    {
        $input = $this->dic->ui()->element()->form()->select()->menu(
            $field->getId(), $field->getName(), $field->getOptions()
        );

        $input = $input->withCssClassesAdded($field->getCssClasses());

        return $input->render();
    }

    /**
     * @return string
     */
    public function getChevronGlyphsHtml(): string
    {
        $chevDown = $this->dic->ui()->component()->glyph()->chevron()
            ->down()->withCssClassAdded(self::CSS_CLASS_CHEVRON_DOWN);

        $chevUp = $this->dic->ui()->component()->glyph()->chevron()
            ->up()->withCssClassAdded(self::CSS_CLASS_CHEVRON_UP);

        return $chevDown->render().$chevUp->render();
    }
}
