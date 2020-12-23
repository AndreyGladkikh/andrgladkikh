<?php


namespace AndrGladkikh\Kernel;


use AndrGladkikh\Kernel\Controller\ControllerResolver;
use AndrGladkikh\Request\Request;
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
        $request = Request::createRequest();
        $requestHandler = PathResolver::findRequestHandler($request->getUrlPath(), $this->routes);
        $controller = new $requestHandler['controllerClassName'];
        return $controller->{$requestHandler['methodName']}();
    }
}