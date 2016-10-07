<?php

namespace rad8329\placetopay\aim;

use rad8329\placetopay\common\models\Authentication;
use rad8329\placetopay\common\traits\SmartObject;

/**
 * Class Operation.
 *
 * @property Authentication $auth
 * @property string $wsdl
 * @property string $endpoint
 */
abstract class Controller
{
    use SmartObject;

    private $_auth;
    private $_wsdl;
    private $_endpoint;

    /**
     * Operations constructor.
     *
     * @param Authentication $auth
     * @param string         $wsdl
     * @param string         $endpoint
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(Authentication $auth, $wsdl, $endpoint)
    {
        $this->_auth = $auth;

        if (empty($wsdl)) {
            throw new \InvalidArgumentException("'wsdl' is required");
        }

        $this->_wsdl = $wsdl;
        $this->_endpoint = $endpoint;
    }

    /**
     * @return Authentication
     */
    protected function getAuth()
    {
        return $this->_auth;
    }

    /**
     * @return string
     */
    protected function getWsdl()
    {
        return $this->_wsdl;
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return $this->_endpoint;
    }
}
