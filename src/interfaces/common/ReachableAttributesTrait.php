<?php

namespace rad8329\placetopay\interfaces\common;

use rad8329\placetopay\exceptions\UnknownPropertyException;

trait ReachableAttributesTrait
{
    /**
     * @param string $name
     *
     * @return mixed
     *
     * @throws UnknownPropertyException if the property is not defined
     */
    public function __get($name)
    {
        $getter = 'get' . $name;

        if (method_exists($this, $getter)) {
            return $this->$getter();
        }

        throw new UnknownPropertyException('Getting unknown property: ' . get_class($this) . '::' . $name);
    }

    /**
     * Checks if a property is set, i.e. defined and not null.
     *
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing `isset($object->property)`.
     *
     * Note that if the property is not defined, false will be returned.
     *
     * @param string $name the property _name or the event _name
     *
     * @return bool whether the named property is set (not null)
     *
     * @see http://php.net/manual/en/function.isset.php
     */
    public function __isset($name)
    {
        $getter = 'get' . $name;
        if (method_exists($this, $getter)) {
            return $this->$getter() !== null;
        } else {
            return false;
        }
    }
}
