# PlaceToPay SDK

SDK para los mecanismos AIM y PSE

**Requerimientos**
* PHP >=7.1
* ext-soap
* ext-json

**Ejemplos** 

*AIM Authorization Transaction Request*

```php

use rad8329\placetopay\AIMService;
use rad8329\placetopay\interfaces\common\models\Authentication;
use rad8329\placetopay\interfaces\aim\AuthOnlyRequest;

$aim = new AIMService(
    new Authentication('999ff8a0729cdb114dkkk4bbad9ce1dx', 'v2J1HoPP'),
    'https://api.placetopay.com/soap/placetopay/?wsdl',
    'https://api.placetopay.com/gateway/paymentdirect.php'
);

$transaction = $aim->authTransaction(new AuthOnlyRequest(
    [
        'x_language' => 'ES',
        'x_customer_ip' => '181.49.80.236',
        //Pagador
        'x_cust_id' => 'CC 9426666666',
        'x_first_name' => 'Juan',
        'x_last_name' => 'Tamariz',
        'x_phone' => '3006781441',
        'x_email' => 'rad8329@gmail.com',
        //Tarjeta de Crédito
        'x_card_num' => '4007000000027',
        'x_exp_date' => '0117',
        'x_card_code' => '595',
        //Pago
        'x_invoice_num' => 801,
        'x_amount' => '50000.00',
        'x_tax' => '0.00',
        'x_amount_base' => '0.00',
    ]
));
```

*PSE Bank List*

```php

use rad8329\placetopay\PSEService;
use rad8329\placetopay\interfaces\common\models\Authentication;

$pse = new PSEService(
    new Authentication('999ff8a0729cdb114dkkk4bbad9ce1dx', 'v2J1HoPP'),
    'https://api.placetopay.com/soap/placetopay/?wsdl'
);

$bankList = $pse->getBankList();
```

*PSE Create Transaction*

```php

use rad8329\placetopay\PSEService;
use rad8329\placetopay\interfaces\common\models\Authentication;
use rad8329\placetopay\interfaces\common\models\Person;
use rad8329\placetopay\interfaces\pse\CreateTransactionRequest;

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
        
$pse = new PSEService(
    new Authentication('999ff8a0729cdb114dkkk4bbad9ce1dx', 'v2J1HoPP'),
    'https://api.placetopay.com/soap/placetopay/?wsdl'
);

$transaction = $pse->createTransaction(new CreateTransactionRequest([
            'reference' => '123456',
            'totalAmount' => '150000',
            'payer' => $person,
            'ipAddress' => '192.168.8.8',
            'bankCode' => 10071,//Bancolombia dev
            'bankInterface' => '0',
            'returnURL' => 'http://dev.p2p.test/process/123456',
            'currency' => 'COP',
]));
```
