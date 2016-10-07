<?php

namespace rad8329\placetopay\pse\models;

use rad8329\placetopay\common\traits\SmartObject;

/**
 * @property string $transactionID
 * @property string $sessionID
 * @property string $reference
 * @property string $requestDate
 * @property string $bankProcessDate
 * @property string $onTest
 * @property string $returnCode
 * @property string $trazabilityCode
 * @property string $transactionCycle
 * @property string $transactionState
 * @property string $responseCode
 * @property string $responseReasonCode
 * @property string $responseReasonText
 */
class TransactionInformation
{
    use SmartObject;

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
    private $reference;
    /**
     * @var string
     */
    private $requestDate;
    /**
     * @var string
     */
    private $bankProcessDate;
    /**
     * @var string
     */
    private $onTest;
    /**
     * @var string
     */
    private $returnCode;
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
    private $transactionState;
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

    public function __construct(array $config)
    {
        $this->configure($config);
    }

    /**
     * @return mixed
     */
    protected function getTransactionID()
    {
        return $this->transactionID;
    }

    /**
     * @return mixed
     */
    protected function getSessionID()
    {
        return $this->sessionID;
    }

    /**
     * @return mixed
     */
    protected function getReference()
    {
        return $this->reference;
    }

    /**
     * @return mixed
     */
    protected function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * @return mixed
     */
    protected function getBankProcessDate()
    {
        return $this->bankProcessDate;
    }

    /**
     * @return mixed
     */
    protected function getOnTest()
    {
        return $this->onTest;
    }

    /**
     * @return mixed
     */
    protected function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * @return mixed
     */
    protected function getTrazabilityCode()
    {
        return $this->trazabilityCode;
    }

    /**
     * @return mixed
     */
    protected function getTransactionCycle()
    {
        return $this->transactionCycle;
    }

    /**
     * @return mixed
     */
    protected function getTransactionState()
    {
        return $this->transactionState;
    }

    /**
     * @return mixed
     */
    protected function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @return mixed
     */
    protected function getResponseReasonCode()
    {
        return $this->responseReasonCode;
    }

    /**
     * @return mixed
     */
    protected function getResponseReasonText()
    {
        return $this->responseReasonText;
    }
}
