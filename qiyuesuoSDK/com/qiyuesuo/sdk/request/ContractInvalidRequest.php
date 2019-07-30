<?php

class ContractInvalidRequest extends SdkRequest {

    const INVALID_URL = "/v2/contract/invalid";

    private $contractId;
    private $bizId;
    private $sealId;
    private $reason;
    private $deleteDoc;

    public function getUrl() {
        return self::INVALID_URL;
    }

    public function getHttpParamers() {
        $paramSwitcher = ParamSwitcher::instanceParam();
        $paramSwitcher->addParam('contractId', $this->contractId);
        $paramSwitcher->addParam('bizId', $this->bizId);
        $paramSwitcher->addParam('sealId', $this->sealId);
        $paramSwitcher->addParam('reason', $this->reason);
        $paramSwitcher->addParam('deleteDoc', $this->deleteDoc);

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
    public function getSealId()
    {
        return $this->sealId;
    }

    /**
     * @param mixed $sealId
     */
    public function setSealId($sealId)
    {
        $this->sealId = $sealId;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return mixed
     */
    public function getDeleteDoc()
    {
        return $this->deleteDoc;
    }

    /**
     * @param mixed $deleteDoc
     */
    public function setDeleteDoc($deleteDoc)
    {
        $this->deleteDoc = $deleteDoc;
    }

}