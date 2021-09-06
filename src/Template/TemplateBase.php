<?php

namespace iit\Application\Template;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class TemplateBase extends \Smarty
{
    const TEMPLATE_CACHE_DIR = 'cache';

    const LIB_TEMPLATE_DIR = 'lib/vendor/jopawu/iit-application/tpl';
    const APP_TEMPLATE_DIR = 'tpl';

    public function __construct($templateDir = self::APP_TEMPLATE_DIR)
    {
        $this->setTemplateDir($templateDir);
        $this->setCompileDir(self::TEMPLATE_CACHE_DIR);
        $this->setCacheDir(self::TEMPLATE_CACHE_DIR);

        parent::__construct();
    }
}
