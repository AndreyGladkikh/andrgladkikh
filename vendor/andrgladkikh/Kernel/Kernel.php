<?php


namespace AndrGladkikh\Kernel;


class Kernel
{


    public function handleRequest()
    {
        $request = $_SERVER['REQUEST_URI'];
        $documentRoot = $_SERVER['DOCUMENT_ROOT'];
        var_dump($documentRoot);
    }
}