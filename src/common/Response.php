<?php

namespace rad8329\placetopay\common;

use rad8329\placetopay\common\exceptions\InvalidConfigException;
use rad8329\placetopay\common\traits\SmartObject;

/**
 * Class Response.
 *
 * @property array $headers
 * @property array $errors
 */
class Response
{
    use SmartObject;

    /**
     * @var array
     */
    private $_headers;

    /**
     * @var array
     */
    private $_data = [];

    /**
     * @var array
     */
    private $_errors = [];

    /**
     * Response constructor.
     *
     * @param array $config
     *
     * @throws InvalidConfigException
     */
    public function __construct(array $config)
    {
        unset($config['data']);

        foreach ($config as $property => $value) {
            $this->setProperty($property, $value);
        }

        if ($this->_headers && !is_array($this->_headers)) {
            throw new InvalidConfigException("The 'headers' is not an array.");
        }

        if ($this->_errors && !is_array($this->_errors)) {
            throw new InvalidConfigException("The 'errors' is not an array.");
        }
    }

    /**
     * @param string $data
     * @param mixed  $value
     *
     * @return Response
     */
    public function set($data, $value)
    {
        $this->_data[$data] = $value;

        return $this;
    }

    /**
     * @param string $data
     * @param mixed  $default
     *
     * @return array
     */
    public function get($data, $default = null)
    {
        return isset($this->_data[$data]) ? $this->_data[$data] : $default;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->_headers;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->_errors;
    }
}
