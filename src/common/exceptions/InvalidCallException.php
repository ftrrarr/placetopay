<?php

namespace rad8329\placetopay\common\exceptions;

class InvalidCallException extends \BadMethodCallException
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Invalid Call';
    }
}
