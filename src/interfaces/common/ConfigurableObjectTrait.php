<?php

namespace rad8329\placetopay\interfaces\common;

use rad8329\placetopay\exceptions\UnknownPropertyException;

trait ConfigurableObjectTrait
{
    /**
     * @param array $properties
     *
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     */
    protected function configure(array &$properties = [])
    {
        $reflectionProperties = $this->getInheritedProperties(new \ReflectionClass($this));

        foreach ($properties as $name => $value) {
            if (isset($reflectionProperties[$name])) {
                if (property_exists($this, $name)) {
                    $this->$name = $value;
                    unset($properties[$name]);
                }
            } else {
                throw new UnknownPropertyException('Setting unknown property: ' . get_class($this) . '::' . $name);
            }
        }
    }

    /**
     * @param null|\ReflectionClass $class
     * @return array
     */
    private function getInheritedProperties($class)
    {
        if ($class) {
            $properties = array_column($class->getProperties(), 'name', 'name');

            return array_merge($properties, $this->getInheritedProperties($class->getParentClass()));
        }

        return [];
    }
}
