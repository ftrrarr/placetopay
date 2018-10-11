<?php

namespace rad8329\placetopay\exceptions;

class UnauthorizedFault extends \SoapFault implements ExceptionInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Unauthorized Fault';
    }
}
