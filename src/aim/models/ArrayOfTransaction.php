<?php

namespace rad8329\placetopay\aim\models;

use rad8329\placetopay\common\traits\SmartObject;

/**
 * @property Transaction[] $item
 */
class ArrayOfTransaction implements \ArrayAccess, \Iterator, \Countable
{
    use SmartObject;

    /**
     * ArrayOfTransaction constructor.
     *
     * @param array $item
     */
    public function __construct(array $item)
    {
        $this->_item = $item;
    }

    /**
     * @var Transaction[]
     */
    private $_item = [];

    /**
     * @return Transaction[]
     */
    protected function getItem()
    {
        return $this->_item;
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
        return isset($this->_item[$this->offSetName($offset)]);
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
        return $this->_item[$this->offSetName($offset)];
    }

    /**
     * ArrayAccess implementation.
     *
     * @param mixed       $offset The offset to assign the value to
     * @param Transaction $value  The value to set
     */
    public function offsetSet($offset, $value)
    {
        $this->_item[$this->offSetName($offset)] = $value;
    }

    /**
     * ArrayAccess implementation.
     *
     * @param mixed $offset The offset to unset
     */
    public function offsetUnset($offset)
    {
        unset($this->_item[$this->offSetName($offset)]);
    }

    /**
     * Iterator implementation.
     *
     * @return Transaction Return the current element
     */
    public function current()
    {
        return current($this->_item);
    }

    /**
     * Iterator implementation
     * Move forward to next element.
     */
    public function next()
    {
        next($this->_item);
    }

    /**
     * Iterator implementation.
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
        return key($this->_item);
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
     * Iterator implementation
     * Rewind the Iterator to the first element.
     */
    public function rewind()
    {
        reset($this->_item);
    }

    /**
     * Countable implementation.
     *
     * @return Transaction Return count of elements
     */
    public function count()
    {
        return count($this->_item);
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
}
