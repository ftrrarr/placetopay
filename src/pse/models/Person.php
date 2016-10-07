<?php

namespace rad8329\placetopay\pse\models;

use rad8329\placetopay\common\traits\SmartObject;

/**
 * Class Person.
 *
 * @property string $document
 * @property string $documentType
 * @property string $firstName
 * @property string $lastName
 * @property string $company
 * @property string $emailAddress
 * @property string $city
 * @property string $province
 * @property string $phone
 * @property string $country
 * @property string $mobile
 */
class Person
{
    use SmartObject;

    /**
     * @var string
     */
    private $_document;
    /**
     * @var string
     */
    private $_documentType;
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
    private $_city;
    /**
     * @var string
     */
    private $_province;
    /**
     * @var string
     */
    private $_phone;
    /**
     * @var string
     */
    private $_country;
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
        $this->configure($config);
    }

    /**
     * @return string
     */
    protected function getDocument()
    {
        return $this->_document;
    }

    /**
     * @return string
     */
    protected function getDocumentType()
    {
        return $this->_documentType;
    }

    /**
     * @return string
     */
    protected function getFirstName()
    {
        return $this->_firstName;
    }

    /**
     * @return string
     */
    protected function getLastName()
    {
        return $this->_lastName;
    }

    /**
     * @return string
     */
    protected function getCompany()
    {
        return $this->_company;
    }

    /**
     * @return string
     */
    protected function getEmailAddress()
    {
        return $this->_emailAddress;
    }

    /**
     * @return string
     */
    protected function getCity()
    {
        return $this->_city;
    }

    /**
     * @return string
     */
    protected function getProvince()
    {
        return $this->_province;
    }

    /**
     * @return string
     */
    protected function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @return string
     */
    protected function getCountry()
    {
        return $this->_country;
    }

    /**
     * @return string
     */
    protected function getMobile()
    {
        return $this->_mobile;
    }
}
