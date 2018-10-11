<?php

namespace rad8329\placetopay\interfaces\aim;

use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\aim\models\DataFrame;
use rad8329\placetopay\interfaces\common\ConfigurableObjectTrait;
use rad8329\placetopay\interfaces\common\ReachableAttributesTrait;
use rad8329\placetopay\interfaces\common\Response as CommonResponse;
use rad8329\placetopay\interfaces\common\Validation;

/**
 * @property-read DataFrame $dataframe
 */
abstract class Response extends CommonResponse
{
    use ConfigurableObjectTrait{
        //To prevent method collisions
        ConfigurableObjectTrait::configure as private __configure;
    }

    use ReachableAttributesTrait;

    /**
     * @var DataFrame
     */
    private $dataframe;

    /**
     * @param array $headers
     * @param array $data
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     */
    public function __construct(array $headers, array $data)
    {
        parent::__construct($headers);

        $this->__configure($data);

        Validation::checkValidType('dataframe', $this->dataframe, DataFrame::class);
    }

    /**
     * @return DataFrame
     */
    public function getDataframe()
    {
        return $this->dataframe;
    }
}
