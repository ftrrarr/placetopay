<?php

namespace rad8329\placetopay\interfaces\aim;

use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\models\Authentication;

interface RequestInterface
{
    /**
     * Define the constructor in a interface is not a good practice,
     * but in this context, the nature of DTO's with many fields and their validation can be handle internally
     *
     *
     * @param Authentication $auth
     * @param array $data
     * @throws UnknownPropertyException
     */
    public function __construct(Authentication $auth, array $data);
}
