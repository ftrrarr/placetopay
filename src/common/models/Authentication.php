<?php

namespace rad8329\placetopay\common\models;

use rad8329\placetopay\common\traits\SmartObject;

/**
 * Class Authentication.
 *
 * @property string $login
 * @property string $tranKey
 * @property string $seed
 * @property string $additional
 */
class Authentication
{
    use SmartObject;

    /**
     * @var string
     */
    private $_login;

    /**
     * @var string
     */
    private $_tranKey;

    /**
     * @var string
     */
    private $_seed;

    /**
     * @var ArrayOfAttribute
     */
    private $_additional;

    /**
     * Authentication constructor.
     *
     * @param string           $login
     * @param string           $tranKey
     * @param ArrayOfAttribute $additional
     */
    public function __construct($login, $tranKey, ArrayOfAttribute $additional = null)
    {
        $this->_login = $login;
        $this->_seed = date('c');
        $this->_tranKey = $this->generateHashKey($tranKey);

        if ($additional) {
            $this->_additional = $additional;
        }
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->_login;
    }

    /**
     * @return string
     */
    public function getTranKey()
    {
        return $this->_tranKey;
    }

    /**
     * @return string
     */
    public function getSeed()
    {
        return $this->_seed;
    }

    /**
     * @return ArrayOfAttribute
     */
    public function getAdditional()
    {
        return $this->_additional;
    }

    /**
     * @param string $tranKey
     *
     * @return string
     */
    private function generateHashKey($tranKey)
    {
        return sha1($this->_seed.$tranKey, false);
    }
}
