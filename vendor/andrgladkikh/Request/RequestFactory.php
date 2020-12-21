<?php


namespace AndrGladkikh\Request;


class RequestFactory
{
    public function createRequest(): Request
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $params = [];
        switch($requestMethod) {
            case Request::METHOD_GET:
                $params = $_GET;
                break;
            case Request::METHOD_POST:
                $params = $_POST;
                break;
            case Request::METHOD_PUT:
                parse_str(file_get_contents("php://input"),$params);
                break;
            case Request::METHOD_DELETE:
                parse_str(file_get_contents("php://input"),$params);
                break;
        }

        return new Request($urlPath, $params);
    }
}