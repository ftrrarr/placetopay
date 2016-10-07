<?php

namespace rad8329\placetopay\common;

class Arrayable implements ArrayableInterface
{
    /**
     * {@inheritdoc}
     */
    public function toArray(array $properties = [], $recursive = true)
    {
        $data = [];
        foreach ($this->resolveProperties($properties) as $property => $definition) {
            $data[$property] = is_string($definition) ? $this->$definition : call_user_func(
                $definition,
                $this,
                $property
            );
        }

        return $recursive ? Utils::toArray($data) : $data;
    }

    /**
     * @param array $properties
     *
     * @return array the list of properties to be exported
     */
    protected function resolveProperties(array $properties)
    {
        $result = [];

        foreach ($this->properties() as $property => $definition) {
            if (is_int($property)) {
                $property = $definition;
            }
            if (empty($properties) || in_array($property, $properties, true)) {
                $result[$property] = $definition;
            }
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function properties()
    {
        $class = new \ReflectionClass($this);
        $names = [];
        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            if (!$property->isStatic()) {
                $names[] = $property->getName();
            }
        }

        return $names;
    }
}
