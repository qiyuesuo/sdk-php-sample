<?php

class CompanyDetailRequest extends SdkRequest {

    const COMPANY_DETAIL = "/v2/company/detail";  // 公司详情接口地址

    private $companyName;                    // 公司名称

    /**
     * CompanyDetailRequest constructor.
     * @param $companyName
     */
    public function __construct($companyName) {
        $this->companyName = $companyName;
    }


    public function getUrl() {
        return self::COMPANY_DETAIL;
    }

    public function getHttpParamers() {
        $paramSwitcher = ParamSwitcher::instanceParam();
        $paramSwitcher->addParam('companyName', $this->companyName);
        $httpParameters = HttpParameter::httpGetParamer();
        $httpParameters->setParams($paramSwitcher->getParams());
        return $httpParameters;

    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

}