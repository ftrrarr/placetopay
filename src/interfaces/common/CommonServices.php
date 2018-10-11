<?php

/** @noinspection PhpRedundantCatchClauseInspection */

namespace rad8329\placetopay\interfaces\common;

use rad8329\placetopay\exceptions\NotFoundFault;
use rad8329\placetopay\exceptions\SoapFault;
use rad8329\placetopay\exceptions\UnauthorizedFault;
use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\models\Authentication;
use rad8329\placetopay\interfaces\common\models\Transaction;

class CommonServices
{
    /**
     * @noinspection PhpDocRedundantThrowsInspection
     *
     * @param Authentication $auth
     * @param string $wsdl
     * @param mixed $id
     *
     * @return null|Transaction
     * @throws SoapFault
     * @throws \ReflectionException
     * @throws UnauthorizedFault
     * @throws UnknownPropertyException
     */
    static public function getTransactionInformation(Authentication $auth, string $wsdl, $id)
    {
        $params = ['auth' => $auth, 'transactionID' => $id];
        $transaction = null;

        try {
            $client = new \SoapClient($wsdl);
            $response = $client->__soapCall('getTransactionInformation', [$params]);

            $transaction = new Transaction(get_object_vars($response->getTransactionInformationResult));

            return $transaction;
        } catch (\SoapFault $e) {
            SoapFault::transform($e, function () use ($e) {
                if (preg_match('/^No se halló ninguna transacción con los datos suministrados./', $e->getMessage())) {
                    throw new NotFoundFault($e->faultcode, $e->faultstring);
                }
            });
        }

        return $transaction;
    }
}
