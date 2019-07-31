<?php

class SealImageRequest extends SdkRequest {

    const SEAL_IMAGE = "/v2/seal/image";  // 获取印章图片

    private $sealId;

    /**
     * SealImageRequest constructor.
     * @param $sealId
     */
    public function __construct($sealId) {
        $this->sealId = $sealId;
    }

    public function getUrl() {
        return self::SEAL_IMAGE;
    }

    public function getHttpParamers() {
        $paramSwitcher = ParamSwitcher::instanceParam();
        $paramSwitcher->addParam('sealId', $this->sealId);

        $httpParameters = HttpParameter::httpGetParamer();
        $httpParameters->setParams($paramSwitcher->getParams());
        return $httpParameters;
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

}