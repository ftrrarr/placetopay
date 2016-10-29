<?php

$config = [
    'login' => '745333a0729cdb11XXXuuuuad9ce1d0',
    'tranKey' => 'v2333o21',
    'pse.wsdl' => 'https://www.placetopay.com/soap/pse/?wsdl',
    'aim.wsdl' => 'https://api.placetopay.com/soap/placetopay/?wsdl',
    'aim.endpoint' => 'https://api.placetopay.com/gateway/paymentdirect.php',
    'test' => true
];

if (file_exists(__DIR__ . '/main-local.php')) {
    $config = array_merge($config, (array)require __DIR__ . '/main-local.php');
}

return $config;
