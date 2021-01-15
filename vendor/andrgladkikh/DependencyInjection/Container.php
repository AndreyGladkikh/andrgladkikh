<?php


namespace AndrGladkikh\DependencyInjection;

class Container
{
    private static $instance = null;
    private $definitions = [];
    private $singletones = [];

    private function __construct()
    {
    }

    public static function getInstance(): self
    {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function set(string $name, $value)
    {
        $this->definitions[$name] = $value;
        if(array_key_exists($name, $this->singletones)) {
            unset($this->singletones[$name]);
        }
    }

    public function get(string $name)
    {
        if(array_key_exists($name, $this->singletones)) {
            return $this->singletones[$name];
        }

        if(!array_key_exists($name, $this->definitions)) {
            throw new \Exception('Undefined service ' . $name);
        }

        $definition = $this->definitions[$name];
        if($definition instanceof \Closure) {
            $value = $definition($this);
        } else {
            $value = $definition;
        }
        return $this->singletones[$name] = $value;
    }
}