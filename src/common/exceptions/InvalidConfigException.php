<?php

namespace rad8329\placetopay\common\exceptions;

class InvalidConfigException extends Exception
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Invalid Configuration';
    }
}
