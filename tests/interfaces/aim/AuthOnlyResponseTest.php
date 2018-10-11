<?php

/** @noinspection PhpUnhandledExceptionInspection */

namespace rad8329\placetopay\tests\iterfaces\aim;

use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\aim\AuthOnlyResponse;
use rad8329\placetopay\interfaces\aim\models\DataFrame;
use rad8329\placetopay\tests\P2PTestCase;

class AuthOnlyResponseTest extends P2PTestCase
{
    public function testUnknownPropertyException()
    {
        $this->expectException(UnknownPropertyException::class);

        new AuthOnlyResponse(
            [],
            [
                'foolProperty' => 'xyz'
            ]
        );
    }

    public function testSetParentProperties()
    {
        $response = new AuthOnlyResponse(
            [],
            [
                'dataframe' => new DataFrame(""),
            ]
        );

        $this->assertArrayHasKey('dataframe', $response->toArray());
    }
}
