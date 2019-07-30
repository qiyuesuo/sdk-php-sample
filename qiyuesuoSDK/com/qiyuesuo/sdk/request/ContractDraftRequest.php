<?php

/**
 * 创建草稿合同请求类
 */
class ContractDraftRequest extends SdkRequest {

    const CONTRACT_FRAFT = "/v2/contract/draft";  // 创建草稿合同路径

    private $contract;                            // 合同信息

    /**
     * ContractDraftRequest constructor.
     */
    public function __construct($contract) {
        $this->contract = $contract;
    }

    public function getUrl() {
       return self::CONTRACT_FRAFT;
    }

    public function getHttpParamers() {
        $httpParameters = HttpParameter::httpPostParamer();
        $httpParameters->setJsonParams(json_encode($this->contract));
        return $httpParameters;
    }

    /**
     * @return mixed
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @param mixed $contract
     */
    public function setContract($contract)
    {
        $this->contract = $contract;
    }

}