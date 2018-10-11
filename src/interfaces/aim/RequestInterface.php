<?php

namespace rad8329\placetopay\interfaces\aim;


use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\models\Authentication;

interface RequestInterface
{
    /**
     * @param Authentication $auth
     * @param array $data
     * @throws UnknownPropertyException
     */
    public function __construct(Authentication $auth, array $data);
}
