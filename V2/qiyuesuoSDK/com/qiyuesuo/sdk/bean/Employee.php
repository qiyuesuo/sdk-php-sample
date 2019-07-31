<?php

class Employee implements JsonSerializable {

    private $user;
    private $number;
    private $idCardNo;

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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getIdCardNo()
    {
        return $this->idCardNo;
    }

    /**
     * @param mixed $idCardNo
     */
    public function setIdCardNo($idCardNo)
    {
        $this->idCardNo = $idCardNo;
    }

}