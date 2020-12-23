<?php


namespace AndrGladkikh\Kernel;


use AndrGladkikh\Service\ArraySorter;

class PathResolver
{
    public static function findRequestHandler(string $path, array $routes)
    {
        $routes = ArraySorter::sortByElementLength($routes);
        foreach($routes as $path => $route) {

        }
    }
}