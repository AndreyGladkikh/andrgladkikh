<?php


namespace AndrGladkikh\Request;


class Request
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    /**
     * @var string
     */
    private $urlPath;
    /**
     * @var array
     */
    private $params;

    public function __construct(string $urlPath, array $params)
    {
        $this->urlPath = $urlPath;
        $this->params = $params;
    }

    public static function createRequest(): self
    {
        $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        parse_str(file_get_contents("php://input"),$params);
        return new self($urlPath, $params);
    }

    /**
     * @return string
     */
    public function getUrlPath(): string
    {
        return $this->urlPath;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }
}