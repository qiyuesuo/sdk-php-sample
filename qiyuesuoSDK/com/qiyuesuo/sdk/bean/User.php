<?php

class User implements JsonSerializable {

    private $name;              // 姓名
    private $contact;           // 联系方式
    private $contactType;       // 联系类型：MOBILE（手机号），EMAIL（邮箱），EMPLOYEEID（员工ID），NUMBER（员工编号）

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
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return mixed
     */
    public function getContactType()
    {
        return $this->contactType;
    }

    /**
     * @param mixed $contactType
     */
    public function setContactType($contactType)
    {
        $this->contactType = $contactType;
    }

}