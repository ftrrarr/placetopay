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
    private $_documentType;

    /**
     * @var string
     */
    private $_document;

    /**
     * @var string
     */
    private $_firstName;

    /**
     * @var string
     */
    private $_lastName;

    /**
     * @var string
     */
    private $_company;

    /**
     * @var string
     */
    private $_emailAddress;

    /**
     * @var string
     */
    private $_address;

    /**
     * @var string
     */
    private $_city;

    /**
     * @var string
     */
    private $_province;

    /**
     * @var string
     */
    private $_country;

    /**
     * @var string
     */
    private $_phone;

    /**
     * @var string
     */
    private $_mobile;

    /**
     * Person constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        foreach ($config as $property => $value) {
            $this->setProperty($property, $value);
        }
    }

    /**
     * @return string
     */
    public function getDocumentType()
    {
        return $this->_documentType;
    }

    /**
     * @return string
     */
    public function getDocument()
    {
        return $this->_document;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->_firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_lastName;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->_company;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->_emailAddress;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->_province;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->_country;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->_mobile;
    }
}
