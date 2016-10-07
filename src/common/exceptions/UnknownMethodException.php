<?php

namespace rad8329\placetopay\common\exceptions;

class UnknownMethodException extends \BadMethodCallException
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Unknown Method';
    }
}
