<?php

namespace rad8329\placetopay\interfaces\common;

/**
 * @property-read array $headers
 */
abstract class Response extends Arrayable implements ResponseInterface
{
    /**
     * @var array
     */
    private $headers;

    /**
     * @param array $headers
     */
    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
