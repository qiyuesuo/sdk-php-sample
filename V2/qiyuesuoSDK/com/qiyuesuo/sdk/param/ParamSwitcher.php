<?php

class ParamSwitcher implements JsonSerializable {

    private $params;

    public function jsonSerialize() {
        $data = [];
        foreach ($this as $key=>$val){
            if ($val !== null) $data[$key] = $val;
        }
        return $data;
    }

    /**
     * ParamSwitcher constructor.
     * @param $params
     */
    public function __construct($params) {
        $this->params = $params;
    }

    public static function instanceParam(){
        $params = array();
        return new ParamSwitcher($params);
    }

    public function addParam($name, $value){
        $params = $this->params;
        if(is_array($params)){
            $params[$name] = $value;
        }
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

}