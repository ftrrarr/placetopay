<?php

namespace rad8329\placetopay\aim\responses;

use rad8329\placetopay\aim\models\DataFrame;
use rad8329\placetopay\common\exceptions\InvalidConfigException;
use rad8329\placetopay\common\traits\Response;

/**
 * Class AuthOnly.
 *
 * @property DataFrame $dataframe
 */
class AuthOnly
{
    use Response;

    /**
     * @var DataFrame
     */
    private $dataframe;

    /**
     * @param array $config
     *
     * @throws InvalidConfigException
     */
    public function __construct(array $config)
    {
        $this->configure($config);
        
        if ($this->dataframe && !$this->dataframe instanceof DataFrame) {
            throw new InvalidConfigException(
                'The \'dataframe\' is not an instace of rad8329\placetopay\aim\models\DataFrame'
            );
        }
    }

    /**
     * @return DataFrame
     */
    protected function getDataframe()
    {
        return $this->dataframe;
    }
}
