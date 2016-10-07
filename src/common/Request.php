<?php

namespace rad8329\placetopay\common;

use rad8329\placetopay\common\traits\SmartObject;

class Request extends Arrayable
{
    use SmartObject;

    /**
     * @var array
     */
    private $errors = [];

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
        return $this->errors;
    }

    /**
     * @param string $property
     * @param string $message
     */
    public function setError($property, $message)
    {
        if (!isset($this->errors[$property])) {
            $this->errors[$property] = [];
        }

        $this->errors[$property][] = $message;
    }
}
