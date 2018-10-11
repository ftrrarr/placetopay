<?php

namespace rad8329\placetopay\exceptions;


class UnknownMethodException extends \BadMethodCallException implements ExceptionInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Unknown Method';
    }
}
