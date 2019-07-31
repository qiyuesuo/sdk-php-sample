<?php

class EmployeeCreateRequest extends SdkRequest {

    const EMPLOYEE_CREATE = "/v2/employee/create";  // 员工列表接口地址

    private $user;
    private $number;

    public function getUrl() {
        return self::EMPLOYEE_CREATE;
    }

    public function getHttpParamers() {
        $paramSwitcher = ParamSwitcher::instanceParam();
        $paramSwitcher->addParam('user', $this->user);
        $paramSwitcher->addParam('number', $this->number);

        $httpParameters = HttpParameter::httpPostParamer();
        $httpParameters->setJsonParams(json_encode($paramSwitcher->getParams()));
        return $httpParameters;
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

}