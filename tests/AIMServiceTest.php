<?php

/** @noinspection PhpUnhandledExceptionInspection */

namespace rad8329\placetopay\tests;


use GuzzleHttp\Exception\ClientException;
use rad8329\placetopay\AIMService;
use rad8329\placetopay\exceptions\AIMResourceExpetion;
use rad8329\placetopay\exceptions\NotFoundFault;
use rad8329\placetopay\exceptions\SoapFault;
use rad8329\placetopay\interfaces\aim\AuthOnlyRequest;
use rad8329\placetopay\interfaces\aim\AuthOnlyResponse;
use rad8329\placetopay\interfaces\common\models\Authentication;
use rad8329\placetopay\interfaces\common\Response;

class AIMServiceTest extends P2PTestCase
{
    /**
     * @var AuthOnlyResponse|Response|object
     */
    static public $transactionResponse;

    public function testGuzzleHttpClientException()
    {
        $this->expectException(ClientException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessageRegExp('/^Client error response/');

        $auth = new Authentication(self::$config['login'], self::$config['tranKey']);

        $aim = new AIMService(
            $auth,
            self::$config['aim.wsdl'],
            'http://example.com/api.php'
        );

        $aim->authTransaction(new AuthOnlyRequest(
                $auth,
                [
                    //Pago
                    'x_currency_code' => 'COP',
                    'x_amount' => '50000.00',
                    //Tarjeta de Crédito
                    'x_card_num' => '4007000000027',
                    'x_exp_date' => '0119',
                    //Request
                    'x_test_request' => self::$config['test'] ? 'TRUE' : 'FALSE',
                ]
            )
        );
    }

    public function testSoapFaultException()
    {
        $this->expectException(SoapFault::class);

        $auth = new Authentication(self::$config['login'], self::$config['tranKey']);

        $aim = new AIMService(
            $auth,
            'http://example.com/?wsdl',
            self::$config['aim.endpoint']
        );

        $aim->getTransactionInformation('1442944760');
    }

    public function testWrongDataForAuthOnlyTransaction()
    {
        $this->expectException(AIMResourceExpetion::class);
        $this->expectExceptionMessageRegExp('/^Código de moneda inválido o no soportado/');

        $auth = new Authentication(self::$config['login'], self::$config['tranKey']);

        $aim = new AIMService(
            $auth,
            self::$config['aim.wsdl'],
            self::$config['aim.endpoint']
        );

        /**
         * @example el minimo de datos para enviar (AuthOnly) es el siguiente:
         *//*
           [
               //Pago
               'x_currency_code' => 'COP',
               'x_amount' => '50000.00',
               //Tarjeta de Crédito
               'x_card_num' => '4007000000027',
               'x_exp_date' => '0119',
               //Request
               'x_test_request' => self::$config['test'] ? 'TRUE' : 'FALSE',
           ]
         */

        $aim->authTransaction(
            new AuthOnlyRequest(
                $auth,
                [
                    //Pago
                    'x_currency_code' => 'COPX',//Introducimos un error para transacción
                    'x_amount' => '50000.00',
                    //Tarjeta de Crédito
                    'x_card_num' => '4007000000027',
                    'x_exp_date' => '0119',
                    //Request
                    'x_test_request' => self::$config['test'] ? 'TRUE' : 'FALSE',
                ]
            )
        );
    }

    public function testValidDataForAuthOnlyTransaction()
    {
        $auth = new Authentication(self::$config['login'], self::$config['tranKey']);

        $aim = new AIMService(
            $auth,
            self::$config['aim.wsdl'],
            self::$config['aim.endpoint']
        );


        static::$transactionResponse = $aim->authTransaction(
            new AuthOnlyRequest(
                $auth,
                [
                    //Pago
                    'x_currency_code' => 'COP',
                    'x_amount' => '50000.00',
                    'x_invoice_num' => 801, //Para probar después que la transacción tenga el mismo número
                    'x_tax' => '0.00',
                    'x_amount_base' => '0.00',
                    //Pagador
                    'x_cust_id' => 'CC 9426666666',
                    'x_first_name' => 'Juan',
                    'x_last_name' => 'Tamariz',
                    'x_phone' => '3006781441',
                    'x_email' => 'rad8329@gmail.com',
                    //Tarjeta de Crédito
                    'x_card_num' => '4007000000027',
                    'x_exp_date' => '0119',
                    'x_card_code' => '595',
                    //Request
                    'x_language' => 'ES',
                    'x_customer_ip' => '181.49.80.236',
                    'x_test_request' => self::$config['test'] ? 'TRUE' : 'FALSE',
                ]
            )
        );

        $this->assertEquals('00', static::$transactionResponse->dataframe->x_response_reason_code);
        $this->assertEquals('Aprobada', static::$transactionResponse->dataframe->x_response_reason_text);
    }

    public function testGetTransactionInformationForWrongID()
    {
        $this->expectException(NotFoundFault::class);

        $auth = new Authentication(self::$config['login'], self::$config['tranKey']);

        $aim = new AIMService(
            $auth,
            self::$config['aim.wsdl'],
            self::$config['aim.endpoint']
        );

        $aim->getTransactionInformation('15392726848');
    }

    /**
     * @depends testValidDataForAuthOnlyTransaction
     */
    public function testGetTransactionInformationForValidID()
    {
        $auth = new Authentication(self::$config['login'], self::$config['tranKey']);

        $aim = new AIMService(
            $auth,
            self::$config['aim.wsdl'],
            self::$config['aim.endpoint']
        );

        $response = $aim->getTransactionInformation(static::$transactionResponse->dataframe->x_placetopay_internal_reference);
        $this->assertEquals('801', $response->reference);
    }
}
