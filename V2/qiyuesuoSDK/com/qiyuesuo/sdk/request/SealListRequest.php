<?php

class SealListRequest extends SdkRequest {

    const SEAL_LIST = "/v2/seal/list";  // 印章列表接口地址

    private $selectOffset;      // 查询起始位置，默认为0
    private $selectLimit;       // 查询列表大小，默认1000

    /**
     * SealListRequest constructor.
     * @param $selectOffset
     * @param $selectLimit
     */
    public function __construct($selectOffset, $selectLimit) {
        $this->selectOffset = $selectOffset;
        $this->selectLimit = $selectLimit;
    }

    public function getUrl() {
        return self::SEAL_LIST;
    }

    public function getHttpParamers() {
        $paramSwitcher = ParamSwitcher::instanceParam();
        $paramSwitcher->addParam('selectOffset', $this->selectOffset);
        $paramSwitcher->addParam('selectLimit', $this->selectLimit);

        $httpParameters = HttpParameter::httpGetParamer();
        $httpParameters->setParams($paramSwitcher->getParams());
        return $httpParameters;

    }

    /**
     * @return mixed
     */
    public function getSelectOffset()
    {
        return $this->selectOffset;
    }

    /**
     * @param mixed $selectOffset
     */
    public function setSelectOffset($selectOffset)
    {
        $this->selectOffset = $selectOffset;
    }

    /**
     * @return mixed
     */
    public function getSelectLimit()
    {
        return $this->selectLimit;
    }

    /**
     * @param mixed $selectLimit
     */
    public function setSelectLimit($selectLimit)
    {
        $this->selectLimit = $selectLimit;
    }

}