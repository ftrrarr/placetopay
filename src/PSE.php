<?php

namespace rad8329\placetopay;

use rad8329\placetopay\pse\Controller;
use rad8329\placetopay\pse\models\Bank;

class PSE extends Controller
{
    /**
     * @return Bank[]
     */
    public function getBankList()
    {
        $params = ['auth' => $this->auth];
        $client = new \SoapClient($this->wsdl);
        $banks = [];

        try {
            $response = $client->__soapCall('getBankList', [$params]);
            foreach ($response->getBankListResult->item as $bank) {
                array_push($banks, new Bank($bank->bankCode, $bank->bankName));
            }
        } catch (\SoapFault $e) {
        }

        return $banks;
    }
}
