<?php

class TemplatePageRequest extends SdkRequest {

    const SEAL_LIST = "/v2/template/pageurl";  // 文件模板预览链接接口地址

    private $templateId;                // 模板ID

    public function getUrl() {
        return self::SEAL_LIST;
    }

    public function getHttpParamers() {
        $paramSwitcher = ParamSwitcher::instanceParam();
        $paramSwitcher->addParam('templateId', $this->templateId);

        $httpParameters = HttpParameter::httpGetParamer();
        $httpParameters->setParams($paramSwitcher->getParams());
        return $httpParameters;

    }

    /**
     * @return mixed
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @param mixed $templateId
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
    }

}