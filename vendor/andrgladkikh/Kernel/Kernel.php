<?php


namespace AndrGladkikh\Kernel;


use AndrGladkikh\Database\Database;
use AndrGladkikh\DependencyInjection\Container;
use AndrGladkikh\Request\Request;

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
        $this->initializeContainer();
    }

    public function handleRequest()
    {
        $request = Request::createRequest();
        $requestHandler = PathResolver::findRequestHandler($request->getUrlPath(), $this->routes);
        $controller = new $requestHandler['controllerClassName'];
        return $controller->{$requestHandler['methodName']}();
    }

    private function initializeContainer()
    {
        $databaseConfig = require($this->configDir . '/database.php');

        $container = Container::getInstance();
        $container->set('config_database', $databaseConfig);
        $container->set(Database::class , function($container) {
            return new Database($container->get('config_database'));
        });
    }
}