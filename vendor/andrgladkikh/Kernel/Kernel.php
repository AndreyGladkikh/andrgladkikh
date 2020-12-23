<?php


namespace AndrGladkikh\Kernel;


use AndrGladkikh\Kernel\Controller\ControllerResolver;
use AndrGladkikh\Request\RequestFactory;

class Kernel
{
    /**
     * @var string
     */
    protected $rootDir;

    /**
     * @var string
     */
    protected $configDir;

    /**
     * @var array
     */
    protected $routes;

    public function __construct()
    {
        $this->rootDir = $_SERVER['DOCUMENT_ROOT'];
        $this->configDir = realpath($this->rootDir . "/../config");
        $this->routes = require_once $this->configDir . "/routes.php";
    }

    public function handleRequest()
    {
        $request = RequestFactory::createRequest();
        $controller = ControllerResolver::getControllerName($request);

        var_dump($request);
    }
}