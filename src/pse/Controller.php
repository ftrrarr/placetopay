<?php

namespace rad8329\placetopay\pse;

use rad8329\placetopay\common\models\Authentication;
use rad8329\placetopay\common\traits\SmartObject;

/**
 * Class Operation.
 *
 * @property Authentication $auth
 * @property string $wsdl
 */
abstract class Controller
{
    use SmartObject;

    private $_auth;
    private $_wsdl;

    /**
     * Operations constructor.
     *
     * @param Authentication $auth
     * @param string         $wsdl
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(Authentication $auth, $wsdl)
    {
        $this->_auth = $auth;

        if (empty($wsdl)) {
            throw new \InvalidArgumentException("'wsdl' is required");
        }

        $this->_wsdl = $wsdl;
    }

    /**
     * @return Authentication
     */
    public function getAuth()
    {
        return $this->_auth;
    }

    /**
     * @return string
     */
    public function getWsdl()
    {
        return $this->_wsdl;
    }
}
