<?php

class EmployeeUpdateRequest extends SdkRequest {

    const EMPLOYEE_UPDATE = "/v2/employee/update";  // 员工信息修改接口地址

    private $user;
    private $number;

    public function getUrl() {
        return self::EMPLOYEE_UPDATE;
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