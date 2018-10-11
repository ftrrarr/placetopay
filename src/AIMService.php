<?php

/** @noinspection PhpRedundantCatchClauseInspection */

namespace rad8329\placetopay;

use GuzzleHttp\Client;
use rad8329\placetopay\exceptions\AIMResourceExpetion;
use rad8329\placetopay\exceptions\NotFoundFault;
use rad8329\placetopay\exceptions\RequiredPropertyException;
use rad8329\placetopay\exceptions\SoapFault;
use rad8329\placetopay\exceptions\UnauthorizedFault;
use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\aim\CaptureOnlyRequest;
use rad8329\placetopay\interfaces\aim\CaptureOnlyResponse;
use rad8329\placetopay\interfaces\aim\models\DataFrame;
use rad8329\placetopay\interfaces\common\CommonServices;
use rad8329\placetopay\interfaces\common\models\Transaction;
use rad8329\placetopay\interfaces\aim\AuthOnlyRequest;
use rad8329\placetopay\interfaces\aim\AuthOnlyResponse;
use rad8329\placetopay\interfaces\aim\Request;
use rad8329\placetopay\interfaces\aim\Response;
use rad8329\placetopay\interfaces\aim\ReverseOnlyRequest;
use rad8329\placetopay\interfaces\aim\ReverseOnlyResponse;
use rad8329\placetopay\interfaces\aim\SettleOnlyRequest;
use rad8329\placetopay\interfaces\aim\SettleOnlyResponse;
use rad8329\placetopay\interfaces\aim\VoidOnlyRequest;
use rad8329\placetopay\interfaces\aim\VoidOnlyResponse;
use rad8329\placetopay\interfaces\common\models\Authentication;
use rad8329\placetopay\interfaces\common\Validation;

class AIMService
{
    /**
     * @var Authentication
     */
    private $auth;

    /**
     * @var string
     */
    private $wsdl;

    /**
     * @var string
     */
    private $endpoint;

    /**
     * @param Authentication $auth
     * @param string $wsdl
     * @param string $endpoint
     *
     * @throws RequiredPropertyException
     */
    public function __construct(Authentication $auth, string $wsdl, string $endpoint)
    {
        Validation::checkNoEmpty('auth', $auth);
        Validation::checkNoEmpty('wsdl', $wsdl);
        Validation::checkNoEmpty('endpoint', $endpoint);

        $this->auth = $auth;
        $this->wsdl = $wsdl;
        $this->endpoint = $endpoint;
    }

    /**
     * @noinspection PhpDocRedundantThrowsInspection
     *
     * @param Request $request
     * @param string $responseClass
     * @return Response|object
     * @throws \ReflectionException
     * @throws UnknownPropertyException
     * @throws AIMResourceExpetion
     */
    private function createTransaction(Request $request, string $responseClass)
    {
        $client = new Client();
        $responseResource = $client->post($this->endpoint, [
            'body' => $request->toArray(),
        ]);

        $headers = $responseResource->getHeaders();
        $dataFrame = new DataFrame($responseResource->getBody()->getContents());

        if ($dataFrame->x_response_code == 0) {
            throw new AIMResourceExpetion($dataFrame, $dataFrame->x_response_reason_text);
        }

        /** @noinspection PhpIncompatibleReturnTypeInspection */

        return (new \ReflectionClass($responseClass))->newInstanceArgs([$headers, ['dataframe' => $dataFrame]]);
    }

    /**
     * @param AuthOnlyRequest $request
     * @return AuthOnlyResponse|Response|object
     * @throws \ReflectionException
     * @throws UnknownPropertyException
     * @throws AIMResourceExpetion
     */
    public function authTransaction(AuthOnlyRequest $request)
    {
        return $this->createTransaction($request, AuthOnlyResponse::class);
    }

    /**
     * @param VoidOnlyRequest $request
     * @return VoidOnlyResponse|Response|object
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     * @throws AIMResourceExpetion
     */
    public function voidTransaction(VoidOnlyRequest $request)
    {
        return $this->createTransaction($request, VoidOnlyResponse::class);
    }

    /**
     * @param ReverseOnlyRequest $request
     * @return ReverseOnlyResponse|Response|object
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     * @throws AIMResourceExpetion
     */
    public function reverseTransaction(ReverseOnlyRequest $request)
    {
        return $this->createTransaction($request, ReverseOnlyResponse::class);
    }

    /**
     * @param CaptureOnlyRequest $request
     * @return CaptureOnlyResponse|Response|object
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     * @throws AIMResourceExpetion
     */
    public function captureTransaction(CaptureOnlyRequest $request)
    {
        return $this->createTransaction($request, CaptureOnlyResponse::class);
    }

    /**
     * @param SettleOnlyRequest $request
     * @return SettleOnlyResponse|Response|object
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     * @throws AIMResourceExpetion
     */
    public function settleTransaction(SettleOnlyRequest $request)
    {
        return $this->createTransaction($request, SettleOnlyResponse::class);
    }

    /**
     * @noinspection PhpDocRedundantThrowsInspection
     *
     * @param string $id
     * @return Transaction|null
     * @throws SoapFault
     * @throws UnknownPropertyException
     * @throws UnauthorizedFault
     * @throws \ReflectionException
     * @throws NotFoundFault
     */
    public function getTransactionInformation($id)
    {
        return CommonServices::getTransactionInformation($this->auth, $this->wsdl, $id);
    }

    /**
     * @return Authentication
     */
    public function getAuth(): Authentication
    {
        return $this->auth;
    }

    /**
     * @return string
     */
    public function getWsdl(): string
    {
        return $this->wsdl;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
}
