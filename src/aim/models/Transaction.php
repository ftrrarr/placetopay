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
    private $_transactionID;

    /**
     * @property string
     */
    private $_sessionID;

    /**
     * @property string
     */
    private $_reference;

    /**
     * @property string
     */
    private $_requestDate;

    /**
     * @property string
     */
    private $_bankProcessDate;

    /**
     * @property bool
     */
    private $_onTest;

    /**
     * @property string
     */
    private $_description;

    /**
     * @property string
     */
    private $_currency;

    /**
     * @property float
     */
    private $_totalAmount;

    /**
     * @property float
     */
    private $_taxAmount;

    /**
     * @property float
     */
    private $_devolutionBase;

    /**
     * @property float
     */
    private $_tipAmount;

    /**
     * @property int
     */
    private $_airline;

    /**
     * @property float
     */
    private $_serviceFee;

    /**
     * @property float
     */
    private $_serviceFeeTax;

    /**
     * @property float
     */
    private $_serviceFeeBase;

    /**
     * @property Person
     */
    private $_payer;

    /**
     * @property Person
     */
    private $_buyer;

    /**
     * @property Person
     */
    private $_shipping;

    /**
     * @property string
     */
    private $_ipAddress;

    /**
     * @property string
     */
    private $_userAgent;

    /**
     * @property string
     */
    private $_franchise;

    /**
     * @property string
     */
    private $_franchiseName;

    /**
     * @property string
     */
    private $_bankName;

    /**
     * @property string
     */
    private $_bankCurrency;

    /**
     * @property float
     */
    private $_bankFactor;

    /**
     * @property string
     */
    private $_authorization;

    /**
     * @property string
     */
    private $_receipt;

    /**
     * @property bool
     */
    private $_refunded;

    /**
     * @property string
     */
    private $_transactionState;

    /**
     * @property int
     */
    private $_responseCode;

    /**
     * @property string
     */
    private $_responseReasonCode;

    /**
     * @property string
     */
    private $_responseReasonText;

    /**
     * @property string
     */
    private $_serviceFeeTransactionState;

    /**
     * @property int
     */
    private $_serviceFeeResponseCode;

    /**
     * @property string
     */
    private $_serviceFeeResponseReasonCode;

    /**
     * @property string
     */
    private $_serviceFeeResponseReasonText;

    /**
     * @property string
     */
    private $_serviceFeeAuthorization;

    /**
     * @property string
     */
    private $_serviceFeeReceipt;

    /**
     * @property ArrayOfAttribute
     */
    private $_additional;

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
    public function getTransactionID()
    {
        return $this->_transactionID;
    }

    /**
     * @return string
     */
    public function getSessionID()
    {
        return $this->_sessionID;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->_reference;
    }

    /**
     * @return string
     */
    public function getRequestDate()
    {
        return $this->_requestDate;
    }

    /**
     * @return string
     */
    public function getBankProcessDate()
    {
        return $this->_bankProcessDate;
    }

    /**
     * @return bool
     */
    public function getOnTest()
    {
        return $this->_onTest;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->_currency;
    }

    /**
     * @return float
     */
    public function getTotalAmount()
    {
        return $this->_totalAmount;
    }

    /**
     * @return float
     */
    public function getTaxAmount()
    {
        return $this->_taxAmount;
    }

    /**
     * @return float
     */
    public function getDevolutionBase()
    {
        return $this->_devolutionBase;
    }

    /**
     * @return float
     */
    public function getTipAmount()
    {
        return $this->_tipAmount;
    }

    /**
     * @return int
     */
    public function getAirline()
    {
        return $this->_airline;
    }

    /**
     * @return float
     */
    public function getServiceFee()
    {
        return $this->_serviceFee;
    }

    /**
     * @return float
     */
    public function getServiceFeeTax()
    {
        return $this->_serviceFeeTax;
    }

    /**
     * @return float
     */
    public function getServiceFeeBase()
    {
        return $this->_serviceFeeBase;
    }

    /**
     * @return Person
     */
    public function getPayer()
    {
        return $this->_payer;
    }

    /**
     * @return Person
     */
    public function getBuyer()
    {
        return $this->_buyer;
    }

    /**
     * @return Person
     */
    public function getShipping()
    {
        return $this->_shipping;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->_ipAddress;
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->_userAgent;
    }

    /**
     * @return string
     */
    public function getFranchise()
    {
        return $this->_franchise;
    }

    /**
     * @return string
     */
    public function getFranchiseName()
    {
        return $this->_franchiseName;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->_bankName;
    }

    /**
     * @return string
     */
    public function getBankCurrency()
    {
        return $this->_bankCurrency;
    }

    /**
     * @return float
     */
    public function getBankFactor()
    {
        return $this->_bankFactor;
    }

    /**
     * @return string
     */
    public function getAuthorization()
    {
        return $this->_authorization;
    }

    /**
     * @return string
     */
    public function getReceipt()
    {
        return $this->_receipt;
    }

    /**
     * @return bool
     */
    public function getRefunded()
    {
        return $this->_refunded;
    }

    /**
     * @return string
     */
    public function getTransactionState()
    {
        return $this->_transactionState;
    }

    /**
     * @return int
     */
    public function getResponseCode()
    {
        return $this->_responseCode;
    }

    /**
     * @return string
     */
    public function getResponseReasonCode()
    {
        return $this->_responseReasonCode;
    }

    /**
     * @return string
     */
    public function getResponseReasonText()
    {
        return $this->_responseReasonText;
    }

    /**
     * @return string
     */
    public function getServiceFeeTransactionState()
    {
        return $this->_serviceFeeTransactionState;
    }

    /**
     * @return int
     */
    public function getServiceFeeResponseCode()
    {
        return $this->_serviceFeeResponseCode;
    }

    /**
     * @return string
     */
    public function getServiceFeeResponseReasonCode()
    {
        return $this->_serviceFeeResponseReasonCode;
    }

    /**
     * @return string
     */
    public function getServiceFeeResponseReasonText()
    {
        return $this->_serviceFeeResponseReasonText;
    }

    /**
     * @return string
     */
    public function getServiceFeeAuthorization()
    {
        return $this->_serviceFeeAuthorization;
    }

    /**
     * @return string
     */
    public function getServiceFeeReceipt()
    {
        return $this->_serviceFeeReceipt;
    }

    /**
     * @return ArrayOfAttribute
     */
    public function getAdditional()
    {
        return $this->_additional;
    }
}
