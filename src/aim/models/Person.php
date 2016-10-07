<?php

namespace rad8329\placetopay\aim\models;

use rad8329\placetopay\common\traits\SmartObject;

/**
 * Class Person.
 *
 * @property string $documentType
 * @property string $document
 * @property string $firstName
 * @property string $lastName
 * @property string $company
 * @property string $emailAddress
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $country
 * @property string $phone
 * @property string $mobile
 */
class Person
{
    use SmartObject;

    /**
     * @var string
     */
    private $documentType;

    /**
     * @var string
     */
    private $document;

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
    private $address;

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
    private $country;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $mobile;

    /**
     * Person constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->configure($config);
    }

    /**
     * @return string
     */
    protected function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * @return string
     */
    protected function getDocument()
    {
        return $this->document;
    }

    /**
     * @return string
     */
    protected function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    protected function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    protected function getCompany()
    {
        return $this->company;
    }

    /**
     * @return string
     */
    protected function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @return string
     */
    protected function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    protected function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    protected function getProvince()
    {
        return $this->province;
    }

    /**
     * @return string
     */
    protected function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    protected function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    protected function getMobile()
    {
        return $this->mobile;
    }
}
