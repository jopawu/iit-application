<?php

namespace iit\Application;

use iit\Application\DI\Container;
use iit\Application\Config\Config;
use iit\Application\Http\Request;
use iit\Application\Http\Response;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class Application
{
    const LOCATION_JQUERY_JS = 'lib/vendor/components/jquery/jquery.min.js';
    const LOCATION_JQUERYUI_JS = 'lib/vendor/components/jqueryui/jquery-ui.min.js';
    const LOCATION_JQUERYUI_THEME = 'lib/vendor/components/jqueryui/themes';
    const JQUERY_UI_CSS_FILE = 'jquery-ui.css';

    const THEME_JQUERYUI = 'humanity';

    /**
     * @var Container
     */
    protected $dic;

    /**
     * @param Config $config
     */
    final public function __construct(Config $config)
    {
        $this->dic = Container::create($config);
    }

    abstract public function run();

    protected function addJquery()
    {
        $this->dic->page()->addJavascript(self::LOCATION_JQUERY_JS);
    }

    protected function addJqueryUi()
    {
        $this->dic->page()->addJavascript(self::LOCATION_JQUERYUI_JS);

        $this->dic->page()->addStylesheet(
            self::LOCATION_JQUERYUI_THEME . '/' . self::THEME_JQUERYUI . '/' . self::JQUERY_UI_CSS_FILE
        );
    }
}
