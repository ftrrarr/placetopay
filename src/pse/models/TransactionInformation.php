<?php

namespace rad8329\placetopay\models;

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
    private $_transactionID;
    /**
     * @var string
     */
    private $_sessionID;
    /**
     * @var string
     */
    private $_reference;
    /**
     * @var string
     */
    private $_requestDate;
    /**
     * @var string
     */
    private $_bankProcessDate;
    /**
     * @var string
     */
    private $_onTest;
    /**
     * @var string
     */
    private $_returnCode;
    /**
     * @var string
     */
    private $_trazabilityCode;
    /**
     * @var string
     */
    private $_transactionCycle;
    /**
     * @var string
     */
    private $_transactionState;
    /**
     * @var string
     */
    private $_responseCode;
    /**
     * @var string
     */
    private $_responseReasonCode;
    /**
     * @var string
     */
    private $_responseReasonText;

    public function __construct(array $config)
    {
        foreach ($config as $property => $value) {
            $this->setProperty($property, $value);
        }
    }

    /**
     * @return mixed
     */
    public function getTransactionID()
    {
        return $this->_transactionID;
    }

    /**
     * @return mixed
     */
    public function getSessionID()
    {
        return $this->_sessionID;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->_reference;
    }

    /**
     * @return mixed
     */
    public function getRequestDate()
    {
        return $this->_requestDate;
    }

    /**
     * @return mixed
     */
    public function getBankProcessDate()
    {
        return $this->_bankProcessDate;
    }

    /**
     * @return mixed
     */
    public function getOnTest()
    {
        return $this->_onTest;
    }

    /**
     * @return mixed
     */
    public function getReturnCode()
    {
        return $this->_returnCode;
    }

    /**
     * @return mixed
     */
    public function getTrazabilityCode()
    {
        return $this->_trazabilityCode;
    }

    /**
     * @return mixed
     */
    public function getTransactionCycle()
    {
        return $this->_transactionCycle;
    }

    /**
     * @return mixed
     */
    public function getTransactionState()
    {
        return $this->_transactionState;
    }

    /**
     * @return mixed
     */
    public function getResponseCode()
    {
        return $this->_responseCode;
    }

    /**
     * @return mixed
     */
    public function getResponseReasonCode()
    {
        return $this->_responseReasonCode;
    }

    /**
     * @return mixed
     */
    public function getResponseReasonText()
    {
        return $this->_responseReasonText;
    }
}
