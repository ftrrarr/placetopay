<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/utils.php';

$config = require __DIR__.'/config/main.php';

use rad8329\placetopay\AIM;
use rad8329\placetopay\common\models\Authentication;

$aim = new AIM(
    new Authentication($config['login'], $config['tranKey']),
    $config['aim.wsdl'],
    $config['aim.endpoint']
);

$response = $aim->getTransactionInformation(1442944760);

dumpx($response);
