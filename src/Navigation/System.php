<?php

namespace iit\Application\Navigation;

use iit\Application\DI\Container;

class System
{
    const PARAM_CONTROLLER = 'ctrl';
    const PARAM_COMMAND = 'cmd';

    /**
     * @var Container
     */
    protected $dic;

    /**
     * @var Creator
     */
	protected $creator;

    /**
     * @var Resolver
     */
	protected $resolver;

    /**
     * @param Container $dic
     */
    public function __construct(Container $dic)
    {
        $this->dic = $dic;
        $this->creator = new Creator($dic, $this);
        $this->resolver = new Resolver($dic, $this);
    }

    /**
     * @return Creator
     */
    public function creator() : Creator
    {
        return $this->creator;
    }

    /**
     * @return Resolver
     */
    public function resolver() : Resolver
    {
        return $this->resolver;
    }

    /**
     * @param string $ctrl
     * @param string $cmd
     */
    public function redirect(string $ctrl, string $cmd = null) : void
    {
        $link = $this->creator()->link($ctrl)->withCmd($cmd);
        $this->dic->response()->addHeader('Location', (string)$link);
        $this->dic->response()->flush();
    }
}