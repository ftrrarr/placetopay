<?php

namespace rad8329\placetopay\interfaces\common;

abstract class Arrayable
{
    use ReachableAttributesTrait;

    /**
     * @param bool $recursive
     * @return array
     * @throws \ReflectionException
     */
    public function toArray($recursive = true)
    {
        $data = [];

        foreach ($this->getProperties() as $property) {
            $data[$property] = is_object($this->$property) ? get_object_vars($this->$property) : $this->$property;
        }

        return $this->recursive($data);
    }

    /**
     * @param int|null $type
     * @return array
     * @throws \ReflectionException
     */
    private function getProperties(int $type = null)
    {
        $names = [];

        $class = new \ReflectionClass($this);

        $properties = isset($type) ? $class->getProperties($type) : $class->getProperties();

        //If the parent class is Arrayable type, them its properties will be associate [one level]
        if ($class->isSubclassOf(Arrayable::class)) {
            $parentProperties = isset($type) ?
                $class->getParentClass()->getProperties($type) :
                $class->getParentClass()->getProperties();

            $properties = array_merge($properties, $parentProperties);
        }

        foreach ($properties as $property) {
            if (!$property->isStatic()) {
                $names[] = $property->getName();
            }
        }

        return $names;
    }

    /**
     * This recursion just works on 3 levels,
     * but the nature of DTO's is to be light and perform their task, just transfer data
     *
     * @param mixed $object
     *
     * @return array
     * @throws \ReflectionException
     */
    private function recursive($object)
    {
        if (is_array($object) || is_object($object)) {
            if (is_object($object) && $object instanceof Arrayable) {
                return $object->toArray();
            }

            $result = [];

            foreach ($object as $key => $value) {
                $result[$key] = $this->recursive($value);
            }

            return $result;
        }

        return $object;
    }

    /**
     * @param bool $recursive
     * @return false|string
     * @throws \ReflectionException
     */
    public function toJson($recursive = true)
    {
        return json_encode($this->toArray($recursive));
    }
}
