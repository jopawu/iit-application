<?php

namespace iit\Application\DI;

use Pimple\Container as DIC;
use iit\Application\Config\Config;
use iit\Application\Http\Request;
use iit\Application\Http\Response;
use iit\Application\Database\Database;
use iit\Application\UI\Structure\Document\Xhtml;
use iit\Application\UI\Structure\Content\Page;
use iit\Application\UI\Factory as UiFactory;

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
     * @return Xhtml
     */
    public function doc()
    {
        return $this['doc'];
    }

    /**
     * @return Page
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

        $dic['doc'] = new Xhtml($dic);

        $dic['page'] = new Page($dic);

        $dic['ui'] = new UiFactory();

        return $dic;
    }
}
