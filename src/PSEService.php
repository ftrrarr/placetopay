<?php

/** @noinspection PhpRedundantCatchClauseInspection */

namespace rad8329\placetopay;

use rad8329\placetopay\exceptions\DataValidationFault;
use rad8329\placetopay\exceptions\NotFoundFault;
use rad8329\placetopay\exceptions\RequiredPropertyException;
use rad8329\placetopay\exceptions\SoapFault;
use rad8329\placetopay\exceptions\UnauthorizedFault;
use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\CommonServices;
use rad8329\placetopay\interfaces\common\models\Transaction;
use rad8329\placetopay\interfaces\common\models\Authentication;
use rad8329\placetopay\interfaces\common\Validation;
use rad8329\placetopay\interfaces\pse\models\Bank;
use rad8329\placetopay\interfaces\pse\CreateTransactionRequest;
use rad8329\placetopay\interfaces\pse\CreateTransactionResponse;

class PSEService
{
    /**
     * @var Authentication
     */
    private $auth;

    /**
     * @var string
     */
    private $wsdl;

    /**
     * @param Authentication $auth
     * @param string $wsdl
     *
     * @throws \InvalidArgumentException
     * @throws RequiredPropertyException
     */
    public function __construct(Authentication $auth, string $wsdl)
    {
        Validation::checkNoEmpty('auth', $auth);
        Validation::checkNoEmpty('wsdl', $wsdl);

        $this->auth = $auth;
        $this->wsdl = $wsdl;
    }

    /**
     * @noinspection PhpDocMissingThrowsInspection
     *
     * @return Bank[]
     *
     * @throws SoapFault
     * @throws UnauthorizedFault
     *
     */
    public function getBankList()
    {
        $params = ['auth' => $this->auth];
        $banks = [];

        try {
            $client = new \SoapClient($this->wsdl);

            $responseResource = $client->__soapCall('getBankList', [$params]);

            $banks = array_map(function (\stdClass $bank) {

                return new Bank($bank->bankCode, $bank->bankName);
            }, $responseResource->getBankListResult->item);

        } catch (\SoapFault $e) {
            SoapFault::transform($e);
        }

        return $banks;
    }

    /**
     * @noinspection PhpDocMissingThrowsInspection
     *
     * @param CreateTransactionRequest $request
     * @return CreateTransactionResponse
     * @throws SoapFault
     * @throws UnauthorizedFault
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     */
    public function createTransaction(CreateTransactionRequest $request)
    {
        $params = ['auth' => $this->auth, 'transaction' => $request];
        $response = [];
        $headers = [];

        try {
            $client = new \SoapClient($this->wsdl, ['exceptions' => true]);

            $responseResource = $client->__soapCall('createTransaction', [$params]);
            $headers = ['soap' => $client->__getLastResponseHeaders()];

            $response = [
                'returnCode' => 'FAIL_UNKNOWN',
                'bankURL' => null,
                'trazabilityCode' => null,
                'transactionCycle' => null,
                'transactionID' => null,
                'sessionID' => null,
                'bankCurrency' => null,
                'bankFactor' => null,
                'responseCode' => 0,
                'responseReasonCode' => null,
                'responseReasonText' => 'Ocurrió un error desconocido al hacer la transacción.'
            ];

            if (isset($responseResource->createTransactionResult)) {
                $response = get_object_vars($responseResource->createTransactionResult);
            }
        } catch (\SoapFault $e) {
            SoapFault::transform($e, function () use ($e) {
                throw new DataValidationFault($e->faultcode, $e->faultstring);
            });
        }

        return new CreateTransactionResponse($headers, $response);
    }

    /**
     * @noinspection PhpDocRedundantThrowsInspection
     *
     * @param string $id
     * @return Transaction|null
     * @throws SoapFault
     * @throws UnknownPropertyException
     * @throws UnauthorizedFault
     * @throws \ReflectionException
     * @throws NotFoundFault
     */
    public function getTransactionInformation($id)
    {
        return CommonServices::getTransactionInformation($this->auth, $this->wsdl, $id);
    }

    /**
     * @return Authentication
     */
    protected function getAuth(): Authentication
    {
        return $this->auth;
    }

    /**
     * @return string
     */
    protected function getWsdl(): string
    {
        return $this->wsdl;
    }
}
