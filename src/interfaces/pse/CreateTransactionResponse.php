<?php

namespace rad8329\placetopay\interfaces\pse;

use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\ConfigurableObjectTrait;
use rad8329\placetopay\interfaces\common\Response;

/**
 * @see https://dev.placetopay.com/web/pse/consideraciones-para-pse-2/tipos-de-datos-o-estructuras-2/psetransactionresponse/
 *
 * @property-read string $returnCode
 * @property-read string $bankURL
 * @property-read string $trazabilityCode
 * @property-read string $transactionCycle
 * @property-read string $transactionID
 * @property-read string $sessionID
 * @property-read string $bankCurrency
 * @property-read int $bankFactor
 * @property-read string $responseCode
 * @property-read string $responseReasonCode
 * @property-read string $responseReasonText
 */
class CreateTransactionResponse extends Response
{
    use ConfigurableObjectTrait;

    /**
     * @var string
     */
    private $returnCode;

    /**
     * @var string
     */
    private $bankURL;

    /**
     * @var string
     */
    private $trazabilityCode;

    /**
     * @var string
     */
    private $transactionCycle;

    /**
     * @var string
     */
    private $transactionID;

    /**
     * @var string
     */
    private $sessionID;

    /**
     * @var string
     */
    private $bankCurrency;

    /**
     * @var int
     */
    private $bankFactor;

    /**
     * @var string
     */
    private $responseCode;

    /**
     * @var string
     */
    private $responseReasonCode;

    /**
     * @var string
     */
    private $responseReasonText;

    /**
     * @param array $headers
     * @param array $data
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     */
    public function __construct(array $headers, array $data)
    {
        parent::__construct($headers);

        $this->configure($data);
    }


    /**
     * @return string
     */
    protected function getBankURL()
    {
        return $this->bankURL;
    }

    /**
     * @return string
     */
    protected function getTrazabilityCode()
    {
        return $this->trazabilityCode;
    }

    /**
     * @return string
     */
    protected function getBankCurrency()
    {
        return $this->bankCurrency;
    }

    /**
     * @return int
     */
    protected function getBankFactor()
    {
        return $this->bankFactor;
    }

    /**
     * @return string
     */
    protected function getTransactionCycle()
    {
        return $this->transactionCycle;
    }

    /**
     * @return string
     */
    protected function getTransactionID()
    {
        return $this->transactionID;
    }

    /**
     * @return string
     */
    protected function getSessionID()
    {
        return $this->sessionID;
    }

    /**
     * @return string
     */
    protected function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * @return string
     */
    protected function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @return string
     */
    protected function getResponseReasonCode()
    {
        return $this->responseReasonCode;
    }

    /**
     * @return string
     */
    protected function getResponseReasonText()
    {
        return $this->responseReasonText;
    }
}
