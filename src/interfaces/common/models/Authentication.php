<?php

namespace rad8329\placetopay\interfaces\common\models;

use rad8329\placetopay\interfaces\common\ReachableAttributesTrait;

/**
 * Immutable class
 *
 * @property string $login
 * @property string $tranKey
 * @property string $plainTranKey
 * @property string $seed
 * @property ArrayOfAttribute $additional
 */
class Authentication
{
    use ReachableAttributesTrait;

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
    private $plainTranKey;

    /**
     * @var string
     */
    private $seed;

    /**
     * @var ArrayOfAttribute
     */
    private $additional;

    /**
     * @param string $login
     * @param string $tranKey
     * @param ArrayOfAttribute $additional
     */
    public function __construct(string $login, string $tranKey, ArrayOfAttribute $additional = null)
    {
        $this->login = $login;
        $this->seed = date('c');
        $this->tranKey = $this->generateHashKey($tranKey);
        $this->plainTranKey = $tranKey;

        if ($additional) {
            $this->additional = $additional;
        }
    }

    /**
     * @param string $tranKey
     *
     * @return string
     */
    private function generateHashKey(string $tranKey)
    {
        return sha1($this->seed . $tranKey, false);
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getTranKey()
    {
        return $this->tranKey;
    }

    /**
     * @return string
     */
    public function getPlainTranKey()
    {
        return $this->plainTranKey;
    }

    /**
     * @return string
     */
    public function getSeed()
    {
        return $this->seed;
    }

    /**
     * @return ArrayOfAttribute
     */
    public function getAdditional()
    {
        return $this->additional;
    }
}
