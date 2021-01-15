<?php


namespace AndrGladkikh\Response;


class JsonResponse implements ResponseInterface
{
    /**
     * @var mixed
     */
    private $data;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    public function send()
    {
        echo json_encode($this->data);
    }
}