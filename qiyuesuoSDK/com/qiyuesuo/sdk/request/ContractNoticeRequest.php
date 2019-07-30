<?php

class ContractNoticeRequest extends SdkRequest {

    const NOTICE_URL = "/v2/contract/notice";

    private $contractId;	// 合同ID
    private $bizId;		// 业务ID
    private $signatoryId;	// 签署方ID

    public function getUrl() {
        return self::NOTICE_URL;
    }

    public function getHttpParamers() {
        $paramSwitcher = ParamSwitcher::instanceParam();
        $paramSwitcher->addParam('contractId', $this->contractId);
        $paramSwitcher->addParam('bizId', $this->bizId);
        $paramSwitcher->addParam('signatoryId', $this->signatoryId);

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
    public function getSignatoryId()
    {
        return $this->signatoryId;
    }

    /**
     * @param mixed $signatoryId
     */
    public function setSignatoryId($signatoryId)
    {
        $this->signatoryId = $signatoryId;
    }

}