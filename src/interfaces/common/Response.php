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
     * Response constructor.
     * @param array $headers
     * @param array $data
     */
    public function __construct(array $headers, array $data = [])
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
