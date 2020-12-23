<?php


namespace AndrGladkikh\DependencyInjection;
// todo
class Container
{
    private $services = [];

    public function __construct()
    {
    }

    public function set(string $key)
    {
        if($this->services[$key]) {
            return;
        }
    }

    public function get()
    {

    }
}