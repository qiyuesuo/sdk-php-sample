<?php

class ContractPageRequest extends SdkRequest {
    const  PAGE_URL = "/v2/contract/pageurl";

    private $contractId;
    private $bizId;
    private $user;
    private $callbackPage;

    public function getUrl() {
        return self::PAGE_URL;
    }

    public function getHttpParamers() {
        $paramSwitcher = ParamSwitcher::instanceParam();
        $paramSwitcher->addParam('contractId', $this->contractId);
        $paramSwitcher->addParam('bizId',$this->bizId);
        $paramSwitcher->addParam('user', $this->user);
        $paramSwitcher->addParam('callbackPage', $this->callbackPage);

        $httpParameter = HttpParameter::httpPostParamer();
        $httpParameter->setJsonParams(json_encode($paramSwitcher->getParams()));
        return $httpParameter;
    }

    /**
     * @return mixed
     */
    public function getContractId()
    {
        return $this->contractId;
    }

    /**
     * @param mixed $contractId
     */
    public function setContractId($contractId)
    {
        $this->contractId = $contractId;
    }

    /**
     * @return mixed
     */
    public function getBizId()
    {
        return $this->bizId;
    }

    /**
     * @param mixed $bizId
     */
    public function setBizId($bizId)
    {
        $this->bizId = $bizId;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getCallbackPage()
    {
        return $this->callbackPage;
    }

    /**
     * @param mixed $callbackPage
     */
    public function setCallbackPage($callbackPage)
    {
        $this->callbackPage = $callbackPage;
    }

}