<?php

namespace rad8329\placetopay\aim\responses;

use rad8329\placetopay\aim\models\DataFrame;
use rad8329\placetopay\common\exceptions\InvalidConfigException;

/**
 * Class AuthOnly.
 *
 * @property DataFrame $dataframe
 */
class AuthOnly
{
    use \rad8329\placetopay\common\traits\Response {
        \rad8329\placetopay\common\traits\Response::__construct as private __traitConstruct;
    }
    /**
     * @var DataFrame
     */
    private $_dataframe;

    /**
     * @param array $config
     *
     * @throws InvalidConfigException
     */
    public function __construct(array $config)
    {
        $this->__traitConstruct($config);
        if ($this->_dataframe && !$this->_dataframe instanceof DataFrame) {
            throw new InvalidConfigException('The \'dataframe\' is not an instace of rad8329\placetopay\aim\models\DataFrame');
        }
    }

    /**
     * @return DataFrame
     */
    public function getDataframe()
    {
        return $this->_dataframe;
    }
}
