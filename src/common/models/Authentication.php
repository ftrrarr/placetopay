<?php

namespace rad8329\placetopay\common\models;

use rad8329\placetopay\common\traits\SmartObject;

/**
 * Class Authentication.
 *
 * @property string $login
 * @property string $tranKey
 * @property string $seed
 * @property ArrayOfAttribute $additional
 */
class Authentication
{
    use SmartObject;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $tranKey;

    /**
     * @var string
     */
    private $seed;

    /**
     * @var ArrayOfAttribute
     */
    private $additional;

    /**
     * Authentication constructor.
     *
     * @param string           $login
     * @param string           $tranKey
     * @param ArrayOfAttribute $additional
     */
    public function __construct($login, $tranKey, ArrayOfAttribute $additional = null)
    {
        $this->login = $login;
        $this->seed = date('c');
        $this->tranKey = $this->generateHashKey($tranKey);

        if ($additional) {
            $this->additional = $additional;
        }
    }

    /**
     * @return string
     */
    protected function getLogin()
    {
        return $this->login;
    }

    /**
     * @return string
     */
    protected function getTranKey()
    {
        return $this->tranKey;
    }

    /**
     * @return string
     */
    protected function getSeed()
    {
        return $this->seed;
    }

    /**
     * @return ArrayOfAttribute
     */
    protected function getAdditional()
    {
        return $this->additional;
    }

    /**
     * @param string $tranKey
     *
     * @return string
     */
    private function generateHashKey($tranKey)
    {
        return sha1($this->seed.$tranKey, false);
    }
}
