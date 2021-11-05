<?php

namespace iit\Application\DI;

use Pimple\Container as DIC;
use iit\Application\Config\Config;
use iit\Application\Http\Request;
use iit\Application\Http\Response;
use iit\Application\Database\Database;
use iit\Application\UI\XHTML\Document;
use iit\Application\UI\Layout\Page\HeaderContentFooter;
use iit\Application\UI\Factory as UiFactory;
use iit\Application\DI\Singletons\XhtmlDocument;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Container extends DIC
{
    /**
     * @return Request
     */
    public function request()
    {
        return $this['request'];
    }

    /**
     * @return Response
     */
    public function response()
    {
        return $this['response'];
    }

    /**
     * @return Config
     */
    public function config()
    {
        return $this['config'];
    }

    /**
     * @return Database
     */
    public function db()
    {
        return $this['db'];
    }

    /**
     * @return XhtmlDocument
     */
    public function doc()
    {
        return $this['doc'];
    }

    /**
     * @return HeaderContentFooter
     */
    public function page()
    {
        return $this['page'];
    }

    /**
     * @return UiFactory
     */
    public function ui()
    {
        return $this['ui'];
    }

    /**
     * @param Config $config
     * @return Container
     */
    public static function create(Config $config)
    {
        $dic = new self();

        $dic['request'] = new Request();
        $dic['response'] = new Response();

        $dic['config'] = $config;

        $dic['db'] = new Database(
            $config->getVariable('database', 'host'),
            $config->getVariable('database', 'name'),
            $config->getVariable('database', 'user'),
            $config->getVariable('database', 'pass')
        );

        $dic['ui'] = new UiFactory($dic);

        $dic['doc'] = new XhtmlDocument($dic->ui()->xhtml()->document());

        $dic['page'] = $dic->ui()->layout()->page()->HeaderContentFooter();

        return $dic;
    }
}
