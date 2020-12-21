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