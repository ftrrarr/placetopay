<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/utils.php';

$config = require __DIR__.'/config/main.php';

use rad8329\placetopay\AIM;
use rad8329\placetopay\aim\models\Authentication;
use rad8329\placetopay\aim\requests\AuthOnly;

$aim = new AIM(
    new Authentication($config['login'], $config['tranKey']),
    $config['aim.wsdl'],
    $config['aim.endpoint']
);

$response = $aim->createTransaction(new AuthOnly(
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

dumpx($response->dataframe);
