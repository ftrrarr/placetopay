<?php

namespace rad8329\placetopay\tests;

use rad8329\placetopay\common\models\Authentication;
use rad8329\placetopay\PSE;

class PseTest extends P2PTestCase
{
    /**
     * @expectedException     \SoapFault
     * @expectedExceptionCode 0
     * @expectedExceptionMessageRegExp /^SOAP-ERROR: Parsing WSDL: Couldn't load from/
     */
    public function testSoapFaultException()
    {
        $pse = new PSE(
            new Authentication(self::$config['login'], self::$config['tranKey']),
            'http://example.com/?wsdl'
        );

        $pse->getBankList();
    }
}
