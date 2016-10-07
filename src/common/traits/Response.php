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
    private $headers;

    /**
     * @var array
     */
    private $errors = [];

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

        if ($this->headers && !is_array($this->headers)) {
            throw new InvalidConfigException("The 'headers' is not an array.");
        }

        if ($this->errors && !is_array($this->errors)) {
            throw new InvalidConfigException("The 'errors' is not an array.");
        }
    }

    /**
     * @return array
     */
    protected function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return array
     */
    protected function getErrors()
    {
        return $this->errors;
    }
}
