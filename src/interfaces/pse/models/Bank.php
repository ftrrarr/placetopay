<?php

namespace rad8329\placetopay\interfaces\pse\models;

use rad8329\placetopay\interfaces\common\Arrayable;

/**
 * @property-read string $code
 * @property-read string $name
 */
class Bank extends Arrayable
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    public function __construct(string $code, string $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    /**
     * @return string
     */
    protected function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    protected function getName()
    {
        return $this->name;
    }
}
