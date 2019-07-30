<?php
header("Content-Type: text/html; charset=utf-8");
class Contract implements JsonSerializable {

	private $id;                // 合同ID
	private $bizId;             // 业务ID,一个合同对应一个bizId，不能重复
	private $sn;                // 合同编号
	private $subject;           // 合同主题（合同名称）
	private $description;       // 合同描述
	private $expireTime;        // 合同过期时间；格式为yyyy-MM-dd HH:mm:ss，默认过期时间为业务分类中配置的时间
	private $tenantName;        //
	private $ordinal;           // 是否顺序签署；默认为true
	private $send;              // 是否发起合同
	private $category;          // 业务分类；默认为“默认业务分类”
	private $creator;           // 创建人；默认为虚拟用户
	private $signatories;       // 签署方；签署合同的公司/个人
	private $templateParams;    // 模板参数，用于文件模板的填参
	private $documents;         // 合同文档

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
    public function getSn()
    {
        return $this->sn;
    }

    /**
     * @param mixed $sn
     */
    public function setSn($sn)
    {
        $this->sn = $sn;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getExpireTime()
    {
        return $this->expireTime;
    }

    /**
     * @param mixed $expireTime
     */
    public function setExpireTime($expireTime)
    {
        $this->expireTime = $expireTime;
    }

    /**
     * @return mixed
     */
    public function getTenantName()
    {
        return $this->tenantName;
    }

    /**
     * @param mixed $tenantName
     */
    public function setTenantName($tenantName)
    {
        $this->tenantName = $tenantName;
    }

    /**
     * @return mixed
     */
    public function getOrdinal()
    {
        return $this->ordinal;
    }

    /**
     * @param mixed $ordinal
     */
    public function setOrdinal($ordinal)
    {
        $this->ordinal = $ordinal;
    }

    /**
     * @return mixed
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * @param mixed $send
     */
    public function setSend($send)
    {
        $this->send = $send;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param mixed $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return mixed
     */
    public function getSignatories()
    {
        return $this->signatories;
    }

    /**
     * @param mixed $signatories
     */
    public function setSignatories($signatories)
    {
        $this->signatories = $signatories;
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

    /**
     * @return mixed
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * @param mixed $documents
     */
    public function setDocuments($documents)
    {
        $this->documents = $documents;
    }

}