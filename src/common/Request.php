<?php

namespace rad8329\placetopay\common;

use rad8329\placetopay\common\traits\SmartObject;

class Request extends Arrayable
{
    use SmartObject;

    /**
     * @var array
     */
    private $_errors = [];

    /**
     * @return bool
     */
    public function validate()
    {
        return true;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->_errors;
    }

    /**
     * @param string $property
     * @param string $message
     */
    public function setError($property, $message)
    {
        if (!isset($this->_errors[$property])) {
            $this->_errors[$property] = [];
        }

        $this->_errors[$property][] = $message;
    }
}
