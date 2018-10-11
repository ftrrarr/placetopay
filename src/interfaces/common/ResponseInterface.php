<?php

namespace rad8329\placetopay\interfaces\common;

interface ResponseInterface
{
    /**
     * Define the constructor in a interface is not a good practice,
     * but in this context, the nature of DTO's with many fields and their validation can be handle internally
     *
     * @param array $headers
     * @param array $data
     */
    public function __construct(array $headers, array $data);

    /**
     * @return array
     */
    public function getHeaders();
}
