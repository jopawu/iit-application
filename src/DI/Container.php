<?php

namespace iit\Application\DI;

use Pimple\Container as DIC;
use iit\Application\Config\Config;
use iit\Application\Http\Request;
use iit\Application\Http\Response;
use iit\Application\Database\Database;
use iit\Application\UI\BasicPage;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Container extends DIC
{
    /**
     * @return Config
     */
    public function config()
    {
        return $this['config'];
    }

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
     * @return Database
     */
    public function db()
    {
        return $this['database'];
    }

    /**
     * @return BasicPage
     */
    public function page()
    {
        return $this['page'];
    }

    /**
     * @param Config $config
     * @return Container
     */
    public static function create(Config $config)
    {
        $dic = new self();

        return $dic;
    }
}
