<?php

namespace rad8329\placetopay\common\models;

use rad8329\placetopay\common\traits\SmartObject;

class Attribute
{
    use SmartObject;

    /**
     * @var string
     */
    private $_name;

    /**
     * @var string
     */
    private $_value;

    /**
     * Attribute constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->configure($config);
    }

    /**
     * @return string
     */
    protected function getName()
    {
        return $this->_name;
    }

    /**
     * @return string
     */
    protected function getValue()
    {
        return $this->_value;
    }
}
