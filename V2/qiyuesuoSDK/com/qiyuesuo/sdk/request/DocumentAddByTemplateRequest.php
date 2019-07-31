<?php

class DocumentAddByTemplateRequest extends SdkRequest {

    const ADDBYTEMPLATE_URL = "/v2/document/addbytemplate";

    private $contractId;
    private $bizId;
    private $title;
    private $templateId;
    private $templateParams;

    public function getUrl() {
        return self::ADDBYTEMPLATE_URL;
    }

    public function getHttpParamers() {
        $paramSwitcher = ParamSwitcher::instanceParam();
        $paramSwitcher->addParam('contractId', $this->contractId);
        $paramSwitcher->addParam('bizId', $this->bizId);
        $paramSwitcher->addParam('title', $this->title);
        $paramSwitcher->addParam('templateId', $this->templateId);
        $paramSwitcher->addParam('templateParams', $this->templateParams);

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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

    /**
     * @return mixed
     */
    public function getTemplateParams()
    {
        return $this->templateParams;
    }

    /**
     * @param mixed $templateParams
     */
    public function setTemplateParams($templateParams)
    {
        $this->templateParams = $templateParams;
    }

}