<?php

namespace rad8329\placetopay\exceptions;

class NotFoundFault extends \SoapFault implements ExceptionInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Not Found Fault';
    }
}
