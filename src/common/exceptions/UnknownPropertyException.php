<?php

namespace rad8329\placetopay\common\exceptions;

class UnknownPropertyException extends Exception
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Unknown Property';
    }
}
