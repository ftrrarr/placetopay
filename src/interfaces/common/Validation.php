<?php

namespace rad8329\placetopay\interfaces\common;


use rad8329\placetopay\exceptions\RequiredPropertyException;

class Validation
{
    /**
     * @param string $property
     * @param mixed $value
     * @param mixed $type
     *
     * @throws \InvalidArgumentException
     */
    static function checkValidType(string $property, $value, $type)
    {
        if ($value && !$value instanceof $type) {
            throw new \InvalidArgumentException("'$property' must be instance of $type");
        }
    }

    /**
     * @param string $property
     * @param mixed $value
     * @throws RequiredPropertyException
     */
    static function checkNoEmpty(string $property, $value)
    {
        if (is_null($value) || (is_string($value) && $value === "")) {
            throw new RequiredPropertyException("'$property' is required");
        }
    }
}
