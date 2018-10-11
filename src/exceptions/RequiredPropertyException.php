<?php

namespace rad8329\placetopay\exceptions;


class RequiredPropertyException extends \Exception implements ExceptionInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Unknown Method';
    }
}
