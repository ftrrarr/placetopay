<?php

namespace rad8329\placetopay\interfaces\common\models;

use rad8329\placetopay\interfaces\common\ReachableAttributesTrait;

/**
 * @property-read Transaction[] $item
 */
class ArrayOfTransaction implements \ArrayAccess, \Iterator, \Countable
{
    use ReachableAttributesTrait;

    /**
     * @var Transaction[]
     */
    private $item = [];

    /**
     * ArrayOfTransaction constructor.
     *
     * @param array $item
     */
    public function __construct(array $item)
    {
        $this->item = $item;
    }

    /**
     * ArrayAccess implementation.
     *
     * @param mixed $offset An offset to check for
     *
     * @return bool true on success or false on failure
     */
    public function offsetExists($offset)
    {
        return isset($this->item[$this->offSetName($offset)]);
    }

    /**
     * @param string $offset
     *
     * @return string
     */
    private function offSetName($offset)
    {
        return $offset ? $offset : $this->count();
    }

    /**
     * Countable implementation.
     *
     * @return int
     */
    public function count()
    {
        return count($this->item);
    }

    /**
     * ArrayAccess implementation.
     *
     * @param mixed $offset The offset to retrieve
     *
     * @return Transaction
     */
    public function offsetGet($offset)
    {
        return $this->item[$this->offSetName($offset)];
    }

    /**
     * ArrayAccess implementation.
     *
     * @param mixed       $offset The offset to assign the value to
     * @param Transaction $value  The value to set
     */
    public function offsetSet($offset, $value)
    {
        $this->item[$this->offSetName($offset)] = $value;
    }

    /**
     * ArrayAccess implementation.
     *
     * @param mixed $offset The offset to unset
     */
    public function offsetUnset($offset)
    {
        unset($this->item[$this->offSetName($offset)]);
    }

    /**
     * Iterator implementation.
     *
     * @return Transaction Return the current element
     */
    public function current()
    {
        return current($this->item);
    }

    /**
     * Iterator implementation
     * Move forward to next element.
     */
    public function next()
    {
        next($this->item);
    }

    /**
     * Iterator implementation.
     *
     * @return bool Return the validity of the current position
     */
    public function valid()
    {
        return $this->key() !== null;
    }

    /**
     * Iterator implementation.
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
        return key($this->item);
    }

    /**
     * Iterator implementation
     * Rewind the Iterator to the first element.
     */
    public function rewind()
    {
        reset($this->item);
    }

    /**
     * @return Transaction[]
     */
    protected function getItem()
    {
        return $this->item;
    }
}
