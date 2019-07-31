<?php

class DocumentAddByFileRequest extends SdkRequest {

    const ADDBYFILE_URL = "/v2/document/addbyfile";

    private $contractId;
    private $bizId;
    private $title;
    private $file;
    private $fileSuffix;

    public function getUrl() {
        return self::ADDBYFILE_URL;
    }

    public function getHttpParamers() {
        $paramSwitcher = ParamSwitcher::instanceParam();
        $paramSwitcher->addParam('contractId', $this->contractId);
        $paramSwitcher->addParam('bizId', $this->bizId);
        $paramSwitcher->addParam('title', $this->title);
        $paramSwitcher->addParam('file', $this->file);
        $paramSwitcher->addParam('fileSuffix', $this->fileSuffix);

        $httpParameter = HttpParameter::httpPostParamer();
        $httpParameter->setParams($paramSwitcher->getParams());
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
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getFileSuffix()
    {
        return $this->fileSuffix;
    }

    /**
     * @param mixed $fileSuffix
     */
    public function setFileSuffix($fileSuffix)
    {
        $this->fileSuffix = $fileSuffix;
    }

}