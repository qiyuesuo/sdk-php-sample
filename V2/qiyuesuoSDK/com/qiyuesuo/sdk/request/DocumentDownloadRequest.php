<?php

class DocumentDownloadRequest extends SdkRequest {

    const DOCUMENT_DOWNLOAD = "/v2/document/download";  // 文档下载接口地址

    private $documentId;                 // 文档ID

    /**
     * DocumentDownloadRequest constructor.
     * @param $documentId
     */
    public function __construct($documentId) {
        $this->documentId = $documentId;
    }


    public function getUrl() {
        return self::DOCUMENT_DOWNLOAD;
    }

    public function getHttpParamers() {
        $paramSwitcher = ParamSwitcher::instanceParam();
        $paramSwitcher->addParam('documentId', $this->documentId);

        $httpParameters = HttpParameter::httpGetParamer();
        $httpParameters->setParams($paramSwitcher->getParams());
        return $httpParameters;

    }

    /**
     * @return mixed
     */
    public function getDocumentId()
    {
        return $this->documentId;
    }

    /**
     * @param mixed $documentId
     */
    public function setDocumentId($documentId)
    {
        $this->documentId = $documentId;
    }

}