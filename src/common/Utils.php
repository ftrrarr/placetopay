<?php

namespace rad8329\placetopay\common;

class Utils
{
    /**
     * @param mixed $args
     * @param bool $pretty
     */
    public static function dumpx($args, $pretty = true)
    {
        self::dump($args, $pretty);
        exit;
    }

    /**
     * @param mixed $args
     * @param bool $pretty
     */
    public static function dump($args, $pretty = true)
    {
        if ($pretty) {
            $print = print_r($args, 1);
            $print = str_replace(['<', '>', '{{%', '}}'], ['&lt;', '&gt;', '', ''], $print);
            echo "<pre>$print</pre>";
        } else {
            print_r($args);
        }
    }

    /**
     * @param object|array|string $object the object to be converted into an array
     * @param array $properties
     * @param bool $recursive
     *
     * @return array
     */
    public static function toArray($object, $properties = [], $recursive = true)
    {
        if (is_array($object)) {
            if ($recursive) {
                foreach ($object as $key => $value) {
                    if (is_array($value) || is_object($value)) {
                        $object[$key] = self::toArray($value, $properties, true);
                    }
                }
            }

            return $object;
        } elseif (is_object($object)) {
            if (!empty($properties)) {
                $className = get_class($object);
                if (!empty($properties[$className])) {
                    $result = [];
                    foreach ($properties[$className] as $key => $name) {
                        if (is_int($key)) {
                            $result[$name] = $object->$name;
                        }
                    }

                    return $recursive ? self::toArray($result, $properties) : $result;
                }
            }
            if ($object instanceof Arrayable) {
                $result = $object->toArray([], $recursive);
            } else {
                $result = [];
                foreach ($object as $key => $value) {
                    $result[$key] = $value;
                }
            }

            return $recursive ? self::toArray($result, $properties) : $result;
        } else {
            return [$object];
        }
    }
}
