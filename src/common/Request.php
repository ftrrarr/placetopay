<?php

namespace rad8329\placetopay\common;

class Request
{
    /**
     * @return bool
     */
    public function validate()
    {
        return true;
    }

    /**
     * @return array list of params names.
     */
    public function params()
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

    /**
     * @param array $params the params being requested.
     * @return array the array representation of the object
     */
    public function toArray(array $params = [])
    {
        $data = [];
        foreach ($this->resolveParams($params) as $param => $definition) {
            $data[$param] = is_string($definition) ? $this->$definition : call_user_func($definition, $this, $param);
        }

        return $data;
    }

    /**
     * @param array $params the params being requested for exporting
     * @return array the list of params to be exported.
     */
    protected function resolveParams(array $params)
    {
        $result = [];

        foreach ($this->params() as $param => $definition) {
            if (is_int($param)) {
                $param = $definition;
            }
            if (empty($params) || in_array($param, $params, true)) {
                $result[$param] = $definition;
            }
        }

        return $result;
    }
}
