<?php


namespace AndrGladkikh\Kernel;


use AndrGladkikh\Request\RequestFactory;

class Kernel
{
    protected $rootDir;

    public function __construct()
    {
        $this->rootDir = $_SERVER['DOCUMENT_ROOT'];
    }

    protected function loadConfig()
    {

    }

    public function handleRequest()
    {
        $request = (new RequestFactory())->createRequest();

        var_dump($request);
    }
}