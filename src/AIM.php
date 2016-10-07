<?php

namespace rad8329\placetopay;

use rad8329\placetopay\aim\models\DataFrame;
use rad8329\placetopay\aim\requests\AuthOnly as AuthOnlyRequest;
use rad8329\placetopay\aim\responses\AuthOnly as AuthOnlyResponse;
use rad8329\placetopay\aim\Controller;
use GuzzleHttp\Client;

class AIM extends Controller
{
    /**
     * @param AuthOnlyRequest $request
     *
     * @return AuthOnlyResponse
     */
    public function createTransaction(AuthOnlyRequest $request)
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

            $dataframe = new DataFrame($response->getBody()->getContents());
        }

        return new AuthOnlyResponse(
            array_merge(
                $response_config,
                ['errors' => $request->getErrors(), 'dataframe' => $dataframe]
            )
        );
    }
}
