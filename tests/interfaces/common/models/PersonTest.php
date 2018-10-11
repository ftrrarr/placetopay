<?php

/** @noinspection PhpUnhandledExceptionInspection */

namespace rad8329\placetopay\tests\iterfaces\common\models;

use rad8329\placetopay\exceptions\RequiredPropertyException;
use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\models\Person;
use rad8329\placetopay\tests\P2PTestCase;

class PersonTest extends P2PTestCase
{
    public function testUnknownPropertyException()
    {
        $this->expectException(UnknownPropertyException::class);

        new Person([
            'foolProperty' => 'xyz'
        ]);
    }

    public function testNoEmptyData()
    {
        $this->expectException(RequiredPropertyException::class);

        new Person([
            'firstName' => "Juan",
            'lastName' => "Topo",
            'city' => "Cali",
            'province' => "Valle del Cauca",
            'country' => "Colombia",
            'phone' => "3006781441",
            'mobile' => "3006781441",
            'address' => "Avenida Siempreviva 742",
        ]);
    }

    public function testValidAsArray()
    {
        $person = new Person([
            'documentType' => "XX",
            'document' => "9999",
            'firstName' => "Juan",
            'lastName' => "Topo",
            'emailAddress' => "rad8329@gmail.com",
            'city' => "Cali",
            'province' => "Valle del Cauca",
            'country' => "Colombia",
            'phone' => "3006781441",
            'mobile' => "3006781441",
            'address' => "Avenida Siempreviva 742",
        ]);

        $this->assertArrayHasKey('emailAddress', $person->toArray());
        //fwrite(STDERR, print_r($person, TRUE));
    }
}
