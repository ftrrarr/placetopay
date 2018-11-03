<?php

namespace rad8329\placetopay\interfaces\common\models;

use rad8329\placetopay\exceptions\RequiredPropertyException;
use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\Arrayable;
use rad8329\placetopay\interfaces\common\ConfigurableObjectTrait;
use rad8329\placetopay\interfaces\common\Validation;

/**
 * Immutable class
 *
 * @see https://dev.placetopay.com/web/pse/consideraciones-para-pse-2/tipos-de-datos-o-estructuras-2/person/
 *
 * @property-read string $document
 * @property-read  string $documentType
 * @property-read  string $firstName
 * @property-read  string $lastName
 * @property-read  string $company
 * @property-read  string $emailAddress
 * @property-read  string $city
 * @property-read  string $province
 * @property-read  string $phone
 * @property-read  string $country
 * @property-read  string $mobile
 */
class Person extends Arrayable
{
    use ConfigurableObjectTrait;

    /**
     * @var string
     */
     private $document;

    /**
     * @var string
     */
    private $documentType;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $emailAddress;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $province;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $mobile;

    /**
     * @var string
     */
    private $address;

    /**
     * @param array $config
     * @throws UnknownPropertyException
     * @throws RequiredPropertyException
     * @throws \ReflectionException
     */
    public function __construct(array $config)
    {
        $this->configure($config);

        Validation::checkNoEmpty('documentType',$this->documentType);
        Validation::checkNoEmpty('document',$this->document);
        Validation::checkNoEmpty('emailAddress',$this->emailAddress);
    }

    /**
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @return string
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}
