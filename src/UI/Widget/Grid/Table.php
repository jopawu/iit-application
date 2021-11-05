<?php

namespace iit\Application\UI\Widget\Grid;

use iit\Application\Template\WebTemplate;
use iit\Application\Template\TemplateBase;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Table
{
    const TEMPLATE = 'UI/Widget/Grid/table.html';

    /**
     * @var string
     */
    protected $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function render()
    {
        $template = new WebTemplate();

        $template->assign('ID', $this->id);

        return $template->fetch(self::TEMPLATE);
    }
}
