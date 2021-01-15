<?php


namespace AndrGladkikh\Controller;


use AndrGladkikh\Response\Response;

class AbstractController
{
    public function __construct()
    {
        $this->templatesDir = '/templates';
    }

    protected function render(string $templateName, ?array $data = null)
    {
        require($this->templatesDir . '/' . $templateName);
        return new Response();
    }
}