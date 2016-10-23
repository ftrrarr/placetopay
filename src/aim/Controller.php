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

    private $auth;
    private $wsdl;
    private $endpoint;

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
        $this->auth = $auth;

        if (empty($wsdl)) {
            throw new \InvalidArgumentException("'wsdl' is required");
        }

        $this->wsdl = $wsdl;
        $this->endpoint = $endpoint;
    }

    /**
     * @return Authentication
     */
    protected function getAuth()
    {
        return $this->auth;
    }

    /**
     * @return string
     */
    protected function getWsdl()
    {
        return $this->wsdl;
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return $this->endpoint;
    }
}
