<?php

namespace rad8329\placetopay\exceptions;

class UnknownPropertyException extends \Exception implements ExceptionInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Unknown Property';
    }
}
