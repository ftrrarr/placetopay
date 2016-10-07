<?php

namespace rad8329\placetopay\common\exceptions;

class InvalidParamException extends \BadMethodCallException
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Invalid Parameter';
    }
}
