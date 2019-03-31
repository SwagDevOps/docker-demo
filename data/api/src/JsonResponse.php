<?php

use Slim\Http\Response;
use Slim\Http\StatusCode;
use Slim\Interfaces\Http\HeadersInterface;
use Psr\Http\Message\StreamInterface;

class JsonResponse extends Response
{
    /**
     * @var int
     */
    protected const ENCODING_OPTIONS = JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE;

    public function __construct($status = StatusCode::HTTP_OK,  HeadersInterface $headers = null, StreamInterface $body = null)
    {
        parent::__construct($status, $headers, $body);

        $this->headers->set('Content-Type', 'application/json;charset=utf-8');
    }

    /**
     * @param mixed $data
     * @param int $status
     * @return JsonResponse
     */
    public function withData($data, $status = StatusCode::HTTP_OK) : JsonResponse
    {
        return $this->withJson($data, $status, static::ENCODING_OPTIONS);
    }
}