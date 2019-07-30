<?php

class Stamper implements JsonSerializable {
    private $actionId;			//签署动作ID
    private $signatoryId;		//签署方ID
    private $type;				//签署类型
    private $documentId;		//签署文档Id
    private $sealId;			//签署印章Id
    private $offsetX;			//签署横坐标
    private $offsetY;			//签署纵坐标
    private $page;				//签署页码
    private $keyword;			//关键字
    private $keywordIndex;      //关键字索引

    public function jsonSerialize() {
        $data = [];
        foreach ($this as $key=>$val){
            if ($val !== null) $data[$key] = $val;
        }
        return $data;
    }

    /**
     * @return mixed
     */
    public function getActionId()
    {
        return $this->actionId;
    }

    /**
     * @param mixed $actionId
     */
    public function setActionId($actionId)
    {
        $this->actionId = $actionId;
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

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
    public function getOffsetX()
    {
        return $this->offsetX;
    }

    /**
     * @param mixed $offsetX
     */
    public function setOffsetX($offsetX)
    {
        $this->offsetX = $offsetX;
    }

    /**
     * @return mixed
     */
    public function getOffsetY()
    {
        return $this->offsetY;
    }

    /**
     * @param mixed $offsetY
     */
    public function setOffsetY($offsetY)
    {
        $this->offsetY = $offsetY;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param mixed $keyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }

    /**
     * @return mixed
     */
    public function getKeywordIndex()
    {
        return $this->keywordIndex;
    }

    /**
     * @param mixed $keywordIndex
     */
    public function setKeywordIndex($keywordIndex)
    {
        $this->keywordIndex = $keywordIndex;
    }

}