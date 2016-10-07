<?php

namespace rad8329\placetopay\common\traits;

use rad8329\placetopay\common\exceptions\InvalidCallException;
use rad8329\placetopay\common\exceptions\UnknownMethodException;
use rad8329\placetopay\common\exceptions\UnknownPropertyException;

trait SmartObject
{
    /**
     * @param string $property
     * @param mixed  $value
     */
    private function setProperty($property, $value)
    {
        $this->{"_{$property}"} = $value;
    }

    /**
     * @return string the fully qualified name of this class
     */
    public static function className()
    {
        return get_called_class();
    }

    /**
     * @param string $name
     *
     * @return mixed
     *
     * @throws UnknownPropertyException if the property is not defined
     * @throws InvalidCallException     if the property is write-only
     */
    public function __get($name)
    {
        $getter = 'get'.$name;
        if (method_exists($this, $getter)) {
            return $this->$getter();
        } elseif (method_exists($this, 'set'.$name)) {
            throw new InvalidCallException('Getting write-only property: '.get_class($this).'::'.$name);
        } else {
            throw new UnknownPropertyException('Getting unknown property: '.get_class($this).'::'.$name);
        }
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @throws UnknownPropertyException if the property is not defined
     * @throws InvalidCallException     if the property is read-only
     */
    public function __set($name, $value)
    {
        $setter = 'set'.$name;
        if (method_exists($this, $setter)) {
            $this->$setter($value);
        } elseif (method_exists($this, 'get'.$name)) {
            throw new InvalidCallException('Setting read-only property: '.get_class($this).'::'.$name);
        } else {
            throw new UnknownPropertyException('Setting unknown property: '.get_class($this).'::'.$name);
        }
    }

    /**
     * Checks if a property is set, i.e. defined and not null.
     *
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing `isset($object->property)`.
     *
     * Note that if the property is not defined, false will be returned.
     *
     * @param string $name the property name or the event name
     *
     * @return bool whether the named property is set (not null)
     *
     * @see http://php.net/manual/en/function.isset.php
     */
    public function __isset($name)
    {
        $getter = 'get'.$name;
        if (method_exists($this, $getter)) {
            return $this->$getter() !== null;
        } else {
            return false;
        }
    }

    /**
     * Sets an object property to null.
     *
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing `unset($object->property)`.
     *
     * Note that if the property is not defined, this method will do nothing.
     * If the property is read-only, it will throw an exception.
     *
     * @param string $name the property name
     *
     * @throws InvalidCallException if the property is read only
     *
     * @see http://php.net/manual/en/function.unset.php
     */
    public function __unset($name)
    {
        $setter = 'set'.$name;
        if (method_exists($this, $setter)) {
            $this->$setter(null);
        } elseif (method_exists($this, 'get'.$name)) {
            throw new InvalidCallException('Unsetting read-only property: '.get_class($this).'::'.$name);
        }
    }

    /**
     * @param string $name   the method name
     * @param array  $params method parameters
     *
     * @throws UnknownMethodException when calling unknown method
     *
     * @return mixed the method return value
     */
    public function __call($name, $params)
    {
        throw new UnknownMethodException('Calling unknown method: '.get_class($this)."::$name()");
    }

    /**
     * @param string $name
     * @param bool   $checkVars whether to treat member variables as properties
     *
     * @return bool
     */
    public function hasProperty($name, $checkVars = true)
    {
        return $this->canGetProperty($name, $checkVars) || $this->canSetProperty($name, false);
    }

    /**
     * @param string $name
     * @param bool   $checkVars whether to treat member variables as properties
     *
     * @return bool
     */
    public function canGetProperty($name, $checkVars = true)
    {
        return method_exists($this, 'get'.$name) || $checkVars && property_exists($this, $name);
    }

    /**
     * @param string $name
     * @param bool   $checkVars whether to treat member variables as properties
     *
     * @return bool
     */
    public function canSetProperty($name, $checkVars = true)
    {
        return method_exists($this, 'set'.$name) || $checkVars && property_exists($this, $name);
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasMethod($name)
    {
        return method_exists($this, $name);
    }
}
