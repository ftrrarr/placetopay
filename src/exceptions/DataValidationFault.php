<?php

namespace rad8329\placetopay\exceptions;


class DataValidationFault extends \SoapFault implements ExceptionInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Data Validation Fault';
    }
}
