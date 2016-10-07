<?php

namespace rad8329\placetopay\aim\models;

use rad8329\placetopay\common\models\ArrayOfAttribute;
use rad8329\placetopay\common\traits\SmartObject;

/**
 * @property int $transactionID
 * @property string $sessionID
 * @property string $reference
 * @property string $requestDate
 * @property string $bankProcessDate
 * @property bool $onTest
 * @property string $description
 * @property string $currency
 * @property float $totalAmount
 * @property float $taxAmount
 * @property float $devolutionBase
 * @property float $tipAmount
 * @property int $airline
 * @property float $serviceFee
 * @property float $serviceFeeTax
 * @property float $serviceFeeBase
 * @property Person $payer
 * @property Person $buyer
 * @property Person $shipping
 * @property string $ipAddress
 * @property string $userAgent
 * @property string $franchise
 * @property string $franchiseName
 * @property string $bankName
 * @property string $bankCurrency
 * @property float $bankFactor
 * @property string $authorization
 * @property string $receipt
 * @property bool $refunded
 * @property string $transactionState
 * @property int $responseCode
 * @property string $responseReasonCode
 * @property string $responseReasonText
 * @property string $serviceFeeTransactionState
 * @property int $serviceFeeResponseCode
 * @property string $serviceFeeResponseReasonCode
 * @property string $serviceFeeResponseReasonText
 * @property string $serviceFeeAuthorization
 * @property string $serviceFeeReceipt
 * @property ArrayOfAttribute $additional
 */
class Transaction
{
    use SmartObject;

    /**
     * @property int
     */
    private $transactionID;

    /**
     * @property string
     */
    private $sessionID;

    /**
     * @property string
     */
    private $reference;

    /**
     * @property string
     */
    private $requestDate;

    /**
     * @property string
     */
    private $bankProcessDate;

    /**
     * @property bool
     */
    private $onTest;

    /**
     * @property string
     */
    private $description;

    /**
     * @property string
     */
    private $currency;

    /**
     * @property float
     */
    private $totalAmount;

    /**
     * @property float
     */
    private $taxAmount;

    /**
     * @property float
     */
    private $devolutionBase;

    /**
     * @property float
     */
    private $tipAmount;

    /**
     * @property int
     */
    private $airline;

    /**
     * @property float
     */
    private $serviceFee;

    /**
     * @property float
     */
    private $serviceFeeTax;

    /**
     * @property float
     */
    private $serviceFeeBase;

    /**
     * @property Person
     */
    private $payer;

    /**
     * @property Person
     */
    private $buyer;

    /**
     * @property Person
     */
    private $shipping;

    /**
     * @property string
     */
    private $ipAddress;

    /**
     * @property string
     */
    private $userAgent;

    /**
     * @property string
     */
    private $franchise;

    /**
     * @property string
     */
    private $franchiseName;

    /**
     * @property string
     */
    private $bankName;

    /**
     * @property string
     */
    private $bankCurrency;

    /**
     * @property float
     */
    private $bankFactor;

    /**
     * @property string
     */
    private $authorization;

    /**
     * @property string
     */
    private $receipt;

    /**
     * @property bool
     */
    private $refunded;

    /**
     * @property string
     */
    private $transactionState;

    /**
     * @property int
     */
    private $responseCode;

    /**
     * @property string
     */
    private $responseReasonCode;

    /**
     * @property string
     */
    private $responseReasonText;

    /**
     * @property string
     */
    private $serviceFeeTransactionState;

    /**
     * @property int
     */
    private $serviceFeeResponseCode;

    /**
     * @property string
     */
    private $serviceFeeResponseReasonCode;

    /**
     * @property string
     */
    private $serviceFeeResponseReasonText;

    /**
     * @property string
     */
    private $serviceFeeAuthorization;

    /**
     * @property string
     */
    private $serviceFeeReceipt;

    /**
     * @property ArrayOfAttribute
     */
    private $additional;

    /**
     * Transaction constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->configure($config);
    }

    /**
     * @return int
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
    protected function getReference()
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    protected function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * @return string
     */
    protected function getBankProcessDate()
    {
        return $this->bankProcessDate;
    }

    /**
     * @return bool
     */
    protected function getOnTest()
    {
        return $this->onTest;
    }

    /**
     * @return string
     */
    protected function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    protected function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return float
     */
    protected function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @return float
     */
    protected function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * @return float
     */
    protected function getDevolutionBase()
    {
        return $this->devolutionBase;
    }

    /**
     * @return float
     */
    protected function getTipAmount()
    {
        return $this->tipAmount;
    }

    /**
     * @return int
     */
    protected function getAirline()
    {
        return $this->airline;
    }

    /**
     * @return float
     */
    protected function getServiceFee()
    {
        return $this->serviceFee;
    }

    /**
     * @return float
     */
    protected function getServiceFeeTax()
    {
        return $this->serviceFeeTax;
    }

    /**
     * @return float
     */
    protected function getServiceFeeBase()
    {
        return $this->serviceFeeBase;
    }

    /**
     * @return Person
     */
    protected function getPayer()
    {
        return $this->payer;
    }

    /**
     * @return Person
     */
    protected function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * @return Person
     */
    protected function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @return string
     */
    protected function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @return string
     */
    protected function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @return string
     */
    protected function getFranchise()
    {
        return $this->franchise;
    }

    /**
     * @return string
     */
    protected function getFranchiseName()
    {
        return $this->franchiseName;
    }

    /**
     * @return string
     */
    protected function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @return string
     */
    protected function getBankCurrency()
    {
        return $this->bankCurrency;
    }

    /**
     * @return float
     */
    protected function getBankFactor()
    {
        return $this->bankFactor;
    }

    /**
     * @return string
     */
    protected function getAuthorization()
    {
        return $this->authorization;
    }

    /**
     * @return string
     */
    protected function getReceipt()
    {
        return $this->receipt;
    }

    /**
     * @return bool
     */
    protected function getRefunded()
    {
        return $this->refunded;
    }

    /**
     * @return string
     */
    protected function getTransactionState()
    {
        return $this->transactionState;
    }

    /**
     * @return int
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

    /**
     * @return string
     */
    protected function getServiceFeeTransactionState()
    {
        return $this->serviceFeeTransactionState;
    }

    /**
     * @return int
     */
    protected function getServiceFeeResponseCode()
    {
        return $this->serviceFeeResponseCode;
    }

    /**
     * @return string
     */
    protected function getServiceFeeResponseReasonCode()
    {
        return $this->serviceFeeResponseReasonCode;
    }

    /**
     * @return string
     */
    protected function getServiceFeeResponseReasonText()
    {
        return $this->serviceFeeResponseReasonText;
    }

    /**
     * @return string
     */
    protected function getServiceFeeAuthorization()
    {
        return $this->serviceFeeAuthorization;
    }

    /**
     * @return string
     */
    protected function getServiceFeeReceipt()
    {
        return $this->serviceFeeReceipt;
    }

    /**
     * @return ArrayOfAttribute
     */
    protected function getAdditional()
    {
        return $this->additional;
    }
}
