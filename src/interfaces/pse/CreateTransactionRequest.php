<?php

namespace rad8329\placetopay\interfaces\pse;

use rad8329\placetopay\exceptions\RequiredPropertyException;
use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\ConfigurableObjectTrait;
use rad8329\placetopay\interfaces\common\models\ArrayOfAttribute;
use rad8329\placetopay\interfaces\common\Request;
use rad8329\placetopay\interfaces\common\Validation;
use rad8329\placetopay\interfaces\common\models\Person;

/**
 * Immutable class
 *
 * @see https://dev.placetopay.com/web/pse/consideraciones-para-pse-2/tipos-de-datos-o-estructuras-2/psetransactionrequest/
 *
 * @property-read string $bankCode
 * @property-read int $bankInterface
 * @property-read string $returnURL
 * @property-read string $reference
 * @property-read string $description
 * @property-read string $language
 * @property-read string $currency
 * @property-read float $totalAmount
 * @property-read float $taxAmount
 * @property-read float $devolutionBase
 * @property-read float $tipAmount
 * @property-read Person $payer
 * @property-read Person $buyer
 * @property-read Person $shipping
 * @property-read string $ipAddress
 * @property-read string $userAgent
 * @property-read ArrayOfAttribute $additionalData
 */
class CreateTransactionRequest extends Request
{
    use ConfigurableObjectTrait;

    /**
     * @var string
     */
    private $bankCode;

    /**
     * @var int
     */
    private $bankInterface;

    /**
     * @var string
     */
    private $returnURL;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $language;

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
     * @var ArrayOfAttribute
     */
    private $additionalData;

    /**
     * @param array $config
     * @throws UnknownPropertyException
     * @throws \InvalidArgumentException
     * @throws RequiredPropertyException
     * @throws \ReflectionException
     */
    public function __construct(array $config)
    {
        $this->configure($config);

        Validation::checkValidType('additionalData', $this->additionalData, ArrayOfAttribute::class);
        Validation::checkValidType('payer', $this->payer, Person::class);
        Validation::checkValidType('buyer', $this->buyer, Person::class);
        Validation::checkValidType('shipping', $this->shipping, Person::class);

        Validation::checkNoEmpty('reference', $this->reference);
        Validation::checkNoEmpty('totalAmount', $this->totalAmount);
        Validation::checkNoEmpty('payer', $this->payer);
        Validation::checkNoEmpty('ipAddress', $this->ipAddress);
        Validation::checkNoEmpty('bankCode', $this->bankCode);
        Validation::checkNoEmpty('bankInterface', $this->bankInterface);
        Validation::checkNoEmpty('returnURL', $this->returnURL);
        Validation::checkNoEmpty('currency', $this->currency);
    }

    /**
     * @return string
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @return int
     */
    public function getBankInterface()
    {
        return $this->bankInterface;
    }

    /**
     * @return string
     */
    public function getReturnURL()
    {
        return $this->returnURL;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
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
     * @return ArrayOfAttribute
     */
    public function getAdditionalData()
    {
        return $this->additionalData;
    }
}
