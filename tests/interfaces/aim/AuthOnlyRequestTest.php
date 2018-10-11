<?php

/** @noinspection PhpUnhandledExceptionInspection */

namespace rad8329\placetopay\tests\iterfaces\aim;

use rad8329\placetopay\exceptions\RequiredPropertyException;
use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\aim\AuthOnlyRequest;
use rad8329\placetopay\interfaces\common\models\Authentication;
use rad8329\placetopay\tests\P2PTestCase;

class AuthOnlyRequestTest extends P2PTestCase
{
    public function testUnknownPropertyException()
    {
        $auth = new Authentication(self::$config['login'], self::$config['tranKey']);

        $this->expectException(UnknownPropertyException::class);

        new AuthOnlyRequest(
            $auth,
            [
                'foolProperty' => 'xyz'
            ]
        );
    }

    public function testSomeInvalidData()
    {
        $this->expectException(RequiredPropertyException::class);

        $auth = new Authentication(self::$config['login'], self::$config['tranKey']);

        new AuthOnlyRequest(
            $auth,
            [
                'x_currency_code' => 'COP'
            ]
        );
    }

    public function testValidAsArray()
    {
        $auth = new Authentication(self::$config['login'], self::$config['tranKey']);

        $request = new AuthOnlyRequest(
            $auth, [
                'x_currency_code' => 'COP',
                'x_amount' => '50000.00',
                'x_card_num' => '4007000000027',
                'x_exp_date' => '0119',
            ]
        );

        $this->assertArrayHasKey('x_login', $request->toArray());
    }
}
