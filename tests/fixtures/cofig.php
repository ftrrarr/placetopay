<?php

$config = [
    'login' => 'a-valid-login',
    'tranKey' => 'a-valid-trankey',
    'pse.wsdl' => 'https://www.placetopay.com/soap/pse/?wsdl',
    'aim.wsdl' => 'https://api.placetopay.com/soap/placetopay/?wsdl',
    'aim.endpoint' => 'https://api.placetopay.com/gateway/paymentdirect.php',
    'test' => true,
];

if (file_exists(__DIR__ . '/config-local.php')) {
    $config = array_merge($config, (array) require __DIR__ . '/config-local.php');
}

return $config;
