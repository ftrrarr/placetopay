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
    private $_code;
    /**
     * @var string
     */
    private $_name;

    public function __construct($bankCode, $bankName)
    {
        $this->_code = $bankCode;
        $this->_name = $bankName;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
}
