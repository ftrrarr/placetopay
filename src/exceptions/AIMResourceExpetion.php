<?php

namespace rad8329\placetopay\exceptions;

use rad8329\placetopay\interfaces\aim\models\DataFrame;
use Throwable;

/**
 * This class, in addition to carrying the exception message,
 * also contains the datatransfer returned by the resource
 */
class AIMResourceExpetion extends \Exception implements ExceptionInterface
{
    /**
     * @var DataFrame
     */
    private $dataframe;

    /**
     * @param DataFrame $dataframe
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(DataFrame $dataframe, string $message = "", int $code = 0, Throwable $previous = null)
    {
        $this->dataframe = $dataframe;

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Data Validation Fault';
    }

    /**
     * @return DataFrame
     */
    public function getDataframe(): DataFrame
    {
        return $this->dataframe;
    }
}
