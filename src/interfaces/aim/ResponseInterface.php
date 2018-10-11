<?php

namespace rad8329\placetopay\interfaces\aim;

use rad8329\placetopay\exceptions\UnknownPropertyException;

interface ResponseInterface
{
    /**
     * @param array $headers
     * @param array $data
     * @throws UnknownPropertyException
     */
    public function __construct(array $headers, array $data);
}
