<?php

/** @noinspection PhpUnhandledExceptionInspection */

namespace rad8329\placetopay\tests\iterfaces\pse;

use rad8329\placetopay\exceptions\RequiredPropertyException;
use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\models\ArrayOfAttribute;
use rad8329\placetopay\interfaces\pse\CreateTransactionRequest;
use rad8329\placetopay\tests\P2PTestCase;
use rad8329\placetopay\interfaces\common\models\Person;

class CreateTransactionRequestTest extends P2PTestCase
{
    public function testUnknownPropertyException()
    {
        $this->expectException(UnknownPropertyException::class);

        new CreateTransactionRequest([
            'foolProperty' => 'xyz'
        ]);
    }

    public function testInvalidBuyerObject()
    {
        $this->expectException(\InvalidArgumentException::class);

        new CreateTransactionRequest([
            'buyer' => new \stdClass(),
        ]);
    }

    public function testInvalidPayerObject()
    {
        $this->expectException(\InvalidArgumentException::class);

        new CreateTransactionRequest([
            'payer' => new \stdClass(),
        ]);
    }

    public function testInvalidShippingObject()
    {
        $this->expectException(\InvalidArgumentException::class);

        new CreateTransactionRequest([
            'shipping' => new \stdClass(),
        ]);
    }

    public function testInvalidAdditionalDataObject()
    {
        $this->expectException(\InvalidArgumentException::class);

        new CreateTransactionRequest([
            'additionalData' => new \stdClass(),
        ]);
    }

    public function testNoEmptyData()
    {
        $this->expectException(RequiredPropertyException::class);

        new CreateTransactionRequest([
        ]);
    }

    public function testValidAsArray()
    {
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

        $request = new CreateTransactionRequest([
            'reference' => '123456',
            'totalAmount' => '150000',
            'ipAddress' => '192.168.8.8',
            'bankCode' => 10071,//Bancolombia dev
            'bankInterface' => '0',
            'returnURL' => 'http://dev.p2p.test/process/123456',
            'currency' => 'COP',
            'payer' => $person,
            'additionalData' => new ArrayOfAttribute([]),
            'shipping' => $person,
            'buyer' => $person
        ]);

        $this->assertArrayHasKey('payer', $request->toArray());
    }
}
