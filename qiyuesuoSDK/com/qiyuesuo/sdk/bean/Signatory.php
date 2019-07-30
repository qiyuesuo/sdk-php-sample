<?php

/**
 *
 * 签署方类
 *
 */
class Signatory implements JsonSerializable {

    private $id;                    // 签署方ID
    private $tenantType;            // 签署方类型
    private $tenantName;            // 签署方名称
    private $receiver;              // 接收人
    private $serialNo;              // 签署顺序
    private $actions;               // 签署动作（签署流程）
    private $attachments;           // 附件要求；用于指定用户签署时上传附件
    private $userAuthInfo;          // 用户认证信息

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
    public function getTenantType()
    {
        return $this->tenantType;
    }

    /**
     * @param mixed $tenantType
     */
    public function setTenantType($tenantType)
    {
        $this->tenantType = $tenantType;
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
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param mixed $receiver
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * @return mixed
     */
    public function getSerialNo()
    {
        return $this->serialNo;
    }

    /**
     * @param mixed $serialNo
     */
    public function setSerialNo($serialNo)
    {
        $this->serialNo = $serialNo;
    }

    /**
     * @return mixed
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * @param mixed $actions
     */
    public function setActions($actions)
    {
        $this->actions = $actions;
    }

    /**
     * @return mixed
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param mixed $attachments
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
    }

    /**
     * @return mixed
     */
    public function getUserAuthInfo()
    {
        return $this->userAuthInfo;
    }

    /**
     * @param mixed $userAuthInfo
     */
    public function setUserAuthInfo($userAuthInfo)
    {
        $this->userAuthInfo = $userAuthInfo;
    }

}