<?php

class EmployeeRemoveRequest extends SdkRequest {

    const EMPLOYEE_REMOVE = "/v2/employee/remove";  // 员工移除接口地址

    private $user;

    public function getUrl() {
        return self::EMPLOYEE_REMOVE;
    }

    public function getHttpParamers() {
        $jsonParams = json_encode($this->getUser());
        $httpParameters = HttpParameter::httpPostParamer();
        $httpParameters->setJsonParams($jsonParams);
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

}