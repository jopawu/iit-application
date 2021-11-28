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

    public function __construct()
    {
        $this->setCompileDir(self::TEMPLATE_CACHE_DIR);
        $this->setCacheDir(self::TEMPLATE_CACHE_DIR);

        parent::__construct();
    }

    public function fetch($template = null, $cache_id = null, $compile_id = null, $parent = null)
    {
        if( $this->isTemplateAvailable(self::APP_TEMPLATE_DIR, $template) )
        {
            $this->setTemplateDir(self::APP_TEMPLATE_DIR);
            return parent::fetch($template);
        }

        if( $this->isTemplateAvailable(self::LIB_TEMPLATE_DIR, $template) )
        {
            $this->setTemplateDir(self::LIB_TEMPLATE_DIR);
            return parent::fetch($template);
        }

        throw new \InvalidArgumentException("template not available: {$template}");
    }

    protected function isTemplateAvailable($templateDir, $templateFile)
    {
        $templatePath = "{$templateDir}/{$templateFile}";

        if( !file_exists($templatePath) )
        {
            return false;
        }

        if( !is_file($templatePath) )
        {
            return false;
        }

        if( !is_readable($templatePath) )
        {
            return false;
        }

        return true;
    }
}
