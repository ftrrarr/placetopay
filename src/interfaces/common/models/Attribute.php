<?php

namespace rad8329\placetopay\interfaces\common\models;

use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\ConfigurableObjectTrait;
use rad8329\placetopay\interfaces\common\ReachableAttributesTrait;

/**
 * Immutable class
 *
 * @package rad8329\placetopay\interfaces\common\models
 */
class Attribute
{
    use ReachableAttributesTrait;
    use ConfigurableObjectTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * @param array $config
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     */
    public function __construct(array $config)
    {
        $this->configure($config);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
