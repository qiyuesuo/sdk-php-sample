<?php

class Company {

    private $id;					//公司Id
    private $name;				    //公司名称
    private $registerNo; 			//公司注册号
    private $status;                //公司状态

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
    public function getRegisterNo()
    {
        return $this->registerNo;
    }

    /**
     * @param mixed $registerNo
     */
    public function setRegisterNo($registerNo)
    {
        $this->registerNo = $registerNo;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}