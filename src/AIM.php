<?php

namespace rad8329\placetopay;

use GuzzleHttp\Client;
use rad8329\placetopay\aim\Controller;
use rad8329\placetopay\aim\models\DataFrame;
use rad8329\placetopay\aim\models\Transaction;
use rad8329\placetopay\aim\requests\AuthOnly as AuthOnlyRequest;
use rad8329\placetopay\aim\responses\AuthOnly as AuthOnlyResponse;

class AIM extends Controller
{
    /**
     * @param AuthOnlyRequest $request
     *
     * @return AuthOnlyResponse
     * @throws \GuzzleHttp\Exception\ClientException
     */
    public function createTransaction(AuthOnlyRequest $request)
    {
        $request->x_login = $this->auth->login;
        $request->x_tran_key = $this->auth->plainTranKey;

        $response_config = [];

        if ($request->validate()) {
            $client = new Client();
            $response = $client->post($this->endpoint, [
                'body' => $request->toArray(),
            ]);

            $response_config['headers'] = $response->getHeaders();
            $response_config['dataframe'] = new DataFrame($response->getBody()->getContents());
        }

        return new AuthOnlyResponse(
            array_merge(
                $response_config,
                ['errors' => $request->getErrors()]
            )
        );
    }


    /**
     * @param int $transactionID
     * @return Transaction
     * @throws \SoapFault
     */
    public function getTransactionInformation($transactionID)
    {
        $params = ['auth' => $this->auth, 'transactionID' => $transactionID];

        $client = new \SoapClient($this->wsdl);
        $response = $client->__soapCall('getTransactionInformation', [$params]);
        $transaction = new Transaction(get_object_vars($response->getTransactionInformationResult));

        return $transaction;
    }
}
