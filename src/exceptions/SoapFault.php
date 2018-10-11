<?php

namespace rad8329\placetopay\exceptions;

class SoapFault extends \SoapFault implements ExceptionInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Soap Fault';
    }

    /**
     * @param \SoapFault $fault
     * @param \Closure $callable
     * @throws SoapFault
     * @throws UnauthorizedFault
     */
    final public static function transform(\SoapFault $fault, \Closure $callable = null)
    {
        if (preg_match('/^Acceso no autorizado/', $fault->getMessage())) {
            throw new UnauthorizedFault($fault->faultcode, $fault->faultstring);
        }

        if ($callable) {
            $callable();
        }

        throw new SoapFault($fault->faultcode, $fault->faultstring);
    }
}
