<?php

namespace rad8329\placetopay\interfaces\aim;

use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\ConfigurableObjectTrait;

class AuthOnlyResponse extends Response
{
    use ConfigurableObjectTrait{
        //To prevent method collisions
        ConfigurableObjectTrait::configure as private __configure;
    }

    /**
     * @param array $headers
     * @param array $data
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     */
    public function __construct(array $headers, array $data)
    {
        $this->__configure($data);

        parent::__construct($headers, $data);
    }
}
