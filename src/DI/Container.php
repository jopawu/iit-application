<?php

namespace iit\Application\DI;

use iit\Application\Filetypes\Factory as FiletypesFactory;
use Pimple\Container as DIC;
use iit\Application\Config\Config;
use iit\Application\Http\Request;
use iit\Application\Http\Response;
use iit\Application\Database\Database;
use iit\Application\UI\XHTML\Document;
use iit\Application\UI\Layout\Page\HeaderContentFooter;
use iit\Application\UI\Factory as UiFactory;
use iit\Application\Formatter\Factory as FormatterFactory;
use iit\Application\Datatypes\Factory as DatatypesFactory;
use iit\Application\DI\Singletons\XhtmlDocument;
use iit\Nextcloud\DAV\Service as NcDavService;
use iit\Nextcloud\DAV\Config as NcDavConfig;
use Ramsey\Uuid\UuidFactory;
use iit\Application\Filesystem\Service as FsService;
use iit\Application\Navigation\System as NavSystem;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Container extends DIC
{
    /**
     * @return Request
     */
    public function request() : Request
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
     * @return FsService
     */
    public function filesystem()
    {
        return $this['filesystem'];
    }

    /**
     * @return FiletypesFactory
     */
    public function filetypes()
    {
        return new FiletypesFactory($this);
    }

    /**
     * @return NavSystem
     */
    public function nav()
    {
        return $this['nav'];
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
        return new UiFactory($this);
    }

    /**
     * @return FormatterFactory
     */
    public function formatter()
    {
        return new FormatterFactory($this);
    }

    /**
     * @return DatatypesFactory
     */
    public function datatypes()
    {
        return new DatatypesFactory($this);
    }

    /**
     * @return NcDavService
     */
    public function nextcloud()
    {
        $config = new NcDavConfig(
            $this->config()->getVariable('nextcloud', 'baseuri'),
            $this->config()->getVariable('nextcloud', 'username'),
            $this->config()->getVariable('nextcloud', 'password')
        );

        return new NcDavService($config);
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

        $dic['filesystem'] = new FsService($dic);
        $dic['nav'] = new NavSystem($dic);

        $dic['config'] = $config;

        $dic['db'] = new Database(
            $config->getVariable('database', 'host'),
            $config->getVariable('database', 'name'),
            $config->getVariable('database', 'user'),
            $config->getVariable('database', 'pass')
        );

        $dic['doc'] = new XhtmlDocument($dic->ui()->xhtml()->document());

        $dic['page'] = $dic->ui()->layout()->page()->HeaderContentFooter();

        return $dic;
    }
}
