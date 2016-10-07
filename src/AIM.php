<?php

namespace rad8329\placetopay;

use rad8329\placetopay\aim\models\ResponseDataFrame;
use rad8329\placetopay\aim\requests\AuthOnly;
use rad8329\placetopay\aim\Controller;
use rad8329\placetopay\common\Response;
use GuzzleHttp\Client;

class AIM extends Controller
{
    /**
     * @param AuthOnly $request
     *
     * @return Response
     */
    public function createTransaction(AuthOnly $request)
    {
        $request->x_login = $this->auth->login;
        $request->x_tran_key = $this->auth->tranKey;

        $response_config = [];

        $dataframe = null;

        if ($request->validate()) {
            $client = new Client();
            $response = $client->post($this->endpoint, [
                'body' => $request->toArray(),
            ]);

            $response_config['headers'] = $response->getHeaders();

            $dataframe = new ResponseDataFrame($response->getBody()->getContents());
        }

        return (new Response(
            array_merge(
                $response_config,
                ['errors' => $request->getErrors()]
            )
        ))->set('dataframe', $dataframe);
    }
}
