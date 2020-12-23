<?php


namespace AndrGladkikh\Kernel;


use AndrGladkikh\Exception\Kernel\NotFoundRequestHandler;

class PathResolver
{
    public static function findRequestHandler(string $requestPath, array $routes)
    {
        /**/
        $keys = array_map('strlen', array_keys($routes));
        array_multisort($keys, SORT_DESC, $routes);
        /**/
        foreach($routes as $path => $route) {
            if(strtolower(trim($requestPath, '/')) === strtolower(trim($path, '/'))) {
                $route = explode('::', $route);
                $controllerClassName = $route[0];
                $methodName = $route[1];
                return [
                    'controllerClassName' => $controllerClassName,
                    'methodName' => $methodName,
                ];
            }
        }
        throw new NotFoundRequestHandler();
    }
}