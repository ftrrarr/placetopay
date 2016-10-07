<?php

namespace rad8329\placetopay\pse\models;

use rad8329\placetopay\common\traits\SmartObject;

/**
 * Class Bank.
 *
 * @property string $code
 * @property string $name
 */
class Bank
{
    use SmartObject;

    /**
     * @var string
     */
    private $code;
    /**
     * @var string
     */
    private $name;

    public function __construct($bankCode, $bankName)
    {
        $this->code = $bankCode;
        $this->name = $bankName;
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
