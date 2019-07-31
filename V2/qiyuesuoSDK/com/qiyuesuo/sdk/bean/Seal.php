<?php

header("Content-Type: text/html; charset=utf-8");
class Seal implements JsonSerializable {

    public function jsonSerialize() {
        $data = [];
        foreach ($this as $key=>$val){
            if ($val !== null) $data[$key] = $val;
        }
        return $data;
    }

    private $id;                    // 印章id
    private $owner;
    private $name;                  // 印章名称
    private $type;                  // 签章类型
    private $spec;                  // 印章规格

    private $sealCategory;          // 印章分类
    private $content;               // 印章环形内容
    private $innerContent;          // 印章内环环形文字
    private $foot;                  // 印章底部文字
    private $head;                  // 印章下横排文字第一排文字
    private $enterpriseCode;        // 企业信息编码

    private $sealLogo;              // 是否需要徽标

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
    public function getSpec()
    {
        return $this->spec;
    }

    /**
     * @param mixed $spec
     */
    public function setSpec($spec)
    {
        $this->spec = $spec;
    }

    /**
     * @return mixed
     */
    public function getSealCategory()
    {
        return $this->sealCategory;
    }

    /**
     * @param mixed $sealCategory
     */
    public function setSealCategory($sealCategory)
    {
        $this->sealCategory = $sealCategory;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getInnerContent()
    {
        return $this->innerContent;
    }

    /**
     * @param mixed $innerContent
     */
    public function setInnerContent($innerContent)
    {
        $this->innerContent = $innerContent;
    }

    /**
     * @return mixed
     */
    public function getFoot()
    {
        return $this->foot;
    }

    /**
     * @param mixed $foot
     */
    public function setFoot($foot)
    {
        $this->foot = $foot;
    }

    /**
     * @return mixed
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param mixed $head
     */
    public function setHead($head)
    {
        $this->head = $head;
    }

    /**
     * @return mixed
     */
    public function getEnterpriseCode()
    {
        return $this->enterpriseCode;
    }

    /**
     * @param mixed $enterpriseCode
     */
    public function setEnterpriseCode($enterpriseCode)
    {
        $this->enterpriseCode = $enterpriseCode;
    }

    /**
     * @return mixed
     */
    public function getSealLogo()
    {
        return $this->sealLogo;
    }

    /**
     * @param mixed $sealLogo
     */
    public function setSealLogo($sealLogo)
    {
        $this->sealLogo = $sealLogo;
    }

    /**
     * @return mixed
     */
    public function getEdgeWidth()
    {
        return $this->edgeWidth;
    }

    /**
     * @param mixed $edgeWidth
     */
    public function setEdgeWidth($edgeWidth)
    {
        $this->edgeWidth = $edgeWidth;
    }

    /**
     * @return mixed
     */
    public function getInnerEdgeWidth()
    {
        return $this->innerEdgeWidth;
    }

    /**
     * @param mixed $innerEdgeWidth
     */
    public function setInnerEdgeWidth($innerEdgeWidth)
    {
        $this->innerEdgeWidth = $innerEdgeWidth;
    }

    /**
     * @return mixed
     */
    public function getLogoSize()
    {
        return $this->logoSize;
    }

    /**
     * @param mixed $logoSize
     */
    public function setLogoSize($logoSize)
    {
        $this->logoSize = $logoSize;
    }

}