<?php

namespace rad8329\placetopay\interfaces\common\models;

use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\Arrayable;
use rad8329\placetopay\interfaces\common\ConfigurableObjectTrait;

/**
 * Immutable class
 *
 * @property-read int $transactionID
 * @property-read string $sessionID
 * @property-read string $reference
 * @property-read string $requestDate
 * @property-read string $bankProcessDate
 * @property-read bool $onTest
 * @property-read string $description
 * @property-read string $currency
 * @property-read float $totalAmount
 * @property-read float $taxAmount
 * @property-read float $devolutionBase
 * @property-read float $tipAmount
 * @property-read int $airline
 * @property-read float $serviceFee
 * @property-read float $serviceFeeTax
 * @property-read float $serviceFeeBase
 * @property-read Person $payer
 * @property-read Person $buyer
 * @property-read Person $shipping
 * @property-read string $ipAddress
 * @property-read string $userAgent
 * @property-read string $franchise
 * @property-read string $franchiseName
 * @property-read string $bankName
 * @property-read string $bankCurrency
 * @property-read float $bankFactor
 * @property-read string $authorization
 * @property-read string $receipt
 * @property-read bool $refunded
 * @property-read string $transactionState
 * @property-read int $responseCode
 * @property-read string $responseReasonCode
 * @property-read string $responseReasonText
 * @property-read string $serviceFeeTransactionState
 * @property-read int $serviceFeeResponseCode
 * @property-read string $serviceFeeResponseReasonCode
 * @property-read string $serviceFeeResponseReasonText
 * @property-read string $serviceFeeAuthorization
 * @property-read string $serviceFeeReceipt
 * @property-read ArrayOfAttribute $additional
 */
class Transaction extends Arrayable
{
    use ConfigurableObjectTrait;

    /**
     * @var int
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
     * @var bool
     */
    private $onTest;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var float
     */
    private $totalAmount;

    /**
     * @var float
     */
    private $taxAmount;

    /**
     * @var float
     */
    private $devolutionBase;

    /**
     * @var float
     */
    private $tipAmount;

    /**
     * @var int
     */
    private $airline;

    /**
     * @var float
     */
    private $serviceFee;

    /**
     * @var float
     */
    private $serviceFeeTax;

    /**
     * @var float
     */
    private $serviceFeeBase;

    /**
     * @var Person
     */
    private $payer;

    /**
     * @var Person
     */
    private $buyer;

    /**
     * @var Person
     */
    private $shipping;

    /**
     * @var string
     */
    private $ipAddress;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * @var string
     */
    private $franchise;

    /**
     * @var string
     */
    private $franchiseName;

    /**
     * @var string
     */
    private $bankName;

    /**
     * @var string
     */
    private $bankCurrency;

    /**
     * @var float
     */
    private $bankFactor;

    /**
     * @var string
     */
    private $authorization;

    /**
     * @var string
     */
    private $receipt;

    /**
     * @var bool
     */
    private $refunded;

    /**
     * @var string
     */
    private $transactionState;

    /**
     * @var int
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
     * @var string
     */
    private $serviceFeeTransactionState;

    /**
     * @var int
     */
    private $serviceFeeResponseCode;

    /**
     * @var string
     */
    private $serviceFeeResponseReasonCode;

    /**
     * @var string
     */
    private $serviceFeeResponseReasonText;

    /**
     * @var string
     */
    private $serviceFeeAuthorization;

    /**
     * @var string
     */
    private $serviceFeeReceipt;

    /**
     * @var ArrayOfAttribute
     */
    private $additional;

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
     * @return int
     */
    public function getTransactionID()
    {
        return $this->transactionID;
    }

    /**
     * @return string
     */
    public function getSessionID()
    {
        return $this->sessionID;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * @return string
     */
    public function getBankProcessDate()
    {
        return $this->bankProcessDate;
    }

    /**
     * @return bool
     */
    public function getOnTest()
    {
        return $this->onTest;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return float
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @return float
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * @return float
     */
    public function getDevolutionBase()
    {
        return $this->devolutionBase;
    }

    /**
     * @return float
     */
    public function getTipAmount()
    {
        return $this->tipAmount;
    }

    /**
     * @return int
     */
    public function getAirline()
    {
        return $this->airline;
    }

    /**
     * @return float
     */
    public function getServiceFee()
    {
        return $this->serviceFee;
    }

    /**
     * @return float
     */
    public function getServiceFeeTax()
    {
        return $this->serviceFeeTax;
    }

    /**
     * @return float
     */
    public function getServiceFeeBase()
    {
        return $this->serviceFeeBase;
    }

    /**
     * @return Person
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * @return Person
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * @return Person
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @return string
     */
    public function getFranchise()
    {
        return $this->franchise;
    }

    /**
     * @return string
     */
    public function getFranchiseName()
    {
        return $this->franchiseName;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @return string
     */
    public function getBankCurrency()
    {
        return $this->bankCurrency;
    }

    /**
     * @return float
     */
    public function getBankFactor()
    {
        return $this->bankFactor;
    }

    /**
     * @return string
     */
    public function getAuthorization()
    {
        return $this->authorization;
    }

    /**
     * @return string
     */
    public function getReceipt()
    {
        return $this->receipt;
    }

    /**
     * @return bool
     */
    public function getRefunded()
    {
        return $this->refunded;
    }

    /**
     * @return string
     */
    public function getTransactionState()
    {
        return $this->transactionState;
    }

    /**
     * @return int
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @return string
     */
    public function getResponseReasonCode()
    {
        return $this->responseReasonCode;
    }

    /**
     * @return string
     */
    public function getResponseReasonText()
    {
        return $this->responseReasonText;
    }

    /**
     * @return string
     */
    public function getServiceFeeTransactionState()
    {
        return $this->serviceFeeTransactionState;
    }

    /**
     * @return int
     */
    public function getServiceFeeResponseCode()
    {
        return $this->serviceFeeResponseCode;
    }

    /**
     * @return string
     */
    public function getServiceFeeResponseReasonCode()
    {
        return $this->serviceFeeResponseReasonCode;
    }

    /**
     * @return string
     */
    public function getServiceFeeResponseReasonText()
    {
        return $this->serviceFeeResponseReasonText;
    }

    /**
     * @return string
     */
    public function getServiceFeeAuthorization()
    {
        return $this->serviceFeeAuthorization;
    }

    /**
     * @return string
     */
    public function getServiceFeeReceipt()
    {
        return $this->serviceFeeReceipt;
    }

    /**
     * @return ArrayOfAttribute
     */
    public function getAdditional()
    {
        return $this->additional;
    }
}
