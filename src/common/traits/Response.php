<?php

namespace rad8329\placetopay\common\traits;

use rad8329\placetopay\common\exceptions\InvalidConfigException;

/**
 * Class Response.
 *
 * @property array $headers
 * @property array $errors
 */
trait Response
{
    use SmartObject;

    /**
     * @var array
     */
    private $_headers;

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
        $this->configure($config);

        if ($this->_headers && !is_array($this->_headers)) {
            throw new InvalidConfigException("The 'headers' is not an array.");
        }

        if ($this->_errors && !is_array($this->_errors)) {
            throw new InvalidConfigException("The 'errors' is not an array.");
        }
    }

    /**
     * @return array
     */
    protected function getHeaders()
    {
        return $this->_headers;
    }

    /**
     * @return array
     */
    protected function getErrors()
    {
        return $this->_errors;
    }
}
