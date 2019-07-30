<?php

class ContractAuditRequest extends SdkRequest {

    const AUDIT_URL = "/v2/contract/employeeaudit";

    private $contractId;
    private $bizId;
    private $employee;
    private $pass;
    private $comment;

    public function getUrl() {
        return self::AUDIT_URL;
    }

    public function getHttpParamers() {
        $paramSwitcher = ParamSwitcher::instanceParam();
        $paramSwitcher->addParam('contractId', $this->getContractId());
        $paramSwitcher->addParam('bizId', $this->bizId);
        $paramSwitcher->addParam('employee', $this->getEmployee());
        $paramSwitcher->addParam('pass', $this->getPass());
        $paramSwitcher->addParam('comment', $this->getComment());
        $httpParameters = HttpParameter::httpPostParamer();
        $httpParameters->setJsonParams(json_encode($paramSwitcher->getParams()));
        return $httpParameters;

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
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * @param mixed $employee
     */
    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
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

}