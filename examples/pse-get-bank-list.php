<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/utils.php';

$config = require __DIR__.'/config/main.php';

use rad8329\placetopay\PSE;
use rad8329\placetopay\common\models\Authentication;

$pse = new PSE(
    new Authentication($config['login'], $config['tranKey']),
    $config['pse.wsdl']
);

$banks = $pse->getBankList();

dumpx($banks);
