<?php

namespace rad8329\placetopay\common;

interface ArrayableInterface
{
    /**
     * @return array
     */
    public function properties();

    /**
     * Converts the object into an array.
     *
     * @param array $properties
     * @param bool $recursive whether to recursively return array representation of embedded objects
     *
     * @return array the array representation of the object
     */
    public function toArray(array $properties = [], $recursive = true);
}
