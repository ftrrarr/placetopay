<?php

/** @noinspection PhpUnhandledExceptionInspection */

namespace rad8329\placetopay\tests;

use rad8329\placetopay\exceptions\DataValidationFault;
use rad8329\placetopay\exceptions\NotFoundFault;
use rad8329\placetopay\exceptions\SoapFault;
use rad8329\placetopay\exceptions\UnauthorizedFault;
use rad8329\placetopay\interfaces\common\models\Authentication;
use rad8329\placetopay\interfaces\common\models\Person;
use rad8329\placetopay\PSEService;
use rad8329\placetopay\interfaces\pse\CreateTransactionRequest;

class PSEServiceTest extends P2PTestCase
{
    public function testSoapFaultException()
    {
        $this->expectException(SoapFault::class);

        $pse = new PSEService(
            new Authentication(self::$config['login'], self::$config['tranKey']),
            'http://example.com/?wsdl'
        );

        $pse->getBankList();
    }

    public function testUnauthorizedException()
    {
        $this->expectException(UnauthorizedFault::class);

        $pse = new PSEService(
            new Authentication('', self::$config['tranKey']),
            self::$config['pse.wsdl']
        );

        $pse->getBankList();
    }

    public function testValidBankList()
    {
        $pse = new PSEService(
            new Authentication(self::$config['login'], self::$config['tranKey']),
            self::$config['pse.wsdl']
        );

        $banks = $pse->getBankList();

        $this->assertGreaterThan(1, count($banks)); //Si tiene más de una posición el arreglo de bancos

        $this->assertObjectHasAttribute("code", $banks[2]);
    }

    public function testWrongDataForTransactionCreation()
    {
        $this->expectException(DataValidationFault::class);

        $pse = new PSEService(
            new Authentication(self::$config['login'], self::$config['tranKey']),
            self::$config['pse.wsdl']
        );

        $person = new Person([
            'documentType' => 'XX',//Datos incorrectos
            'document' => '9999',
            'emailAddress' => 'rad8329@gmail.com',
            'firstName' => 'Juan',
            'lastName' => 'Topo',
            'city' => 'Cali',
            'province' => 'Valle del Cauca',
            'country' => 'Colombia',
            'phone' => '3006781441',
            'mobile' => '3006781441',
            'address' => 'Avenida Siempreviva 742',
        ]);

        $pse->createTransaction(new CreateTransactionRequest([
            'reference' => '123456',
            'totalAmount' => '150000',
            'payer' => $person,
            'ipAddress' => '192.168.8.8',
            'bankCode' => 10071,//Bancolombia dev
            'bankInterface' => '0',
            'returnURL' => 'http://dev.p2p.test/process/123456',
            'currency' => 'COP',
        ]));
    }

    public function testValidDataForTransactionCreation()
    {
        $pse = new PSEService(
            new Authentication(self::$config['login'], self::$config['tranKey']),
            self::$config['pse.wsdl']
        );

        $person = new Person([
            'documentType' => 'CC',
            'document' => '9999',
            'emailAddress' => 'rad8329@gmail.com',
            'firstName' => 'Juan',
            'lastName' => 'Topo',
            'city' => 'Cali',
            'province' => 'Valle del Cauca',
            'country' => 'Colombia',
            'phone' => '3006781441',
            'mobile' => '3006781441',
            'address' => 'Avenida Siempreviva 742',
        ]);

        $response = $pse->createTransaction(new CreateTransactionRequest([
            'reference' => '123456',
            'totalAmount' => '150000',
            'payer' => $person,
            'ipAddress' => '192.168.8.8',
            'bankCode' => 10071,//Bancolombia dev
            'bankInterface' => '0',
            'returnURL' => 'http://dev.p2p.test/process/123456',
            'currency' => 'COP',
        ]));

        $this->assertNotSame('FAIL_UNKNOWN', $response->returnCode);
    }

    public function testGetTransactionInformationForWrongID()
    {
        $this->expectException(NotFoundFault::class);

        $auth = new Authentication(self::$config['login'], self::$config['tranKey']);

        $pse = new PSEService(
            $auth,
            self::$config['aim.wsdl']
        );

        $pse->getTransactionInformation('15392726848');
    }
}
