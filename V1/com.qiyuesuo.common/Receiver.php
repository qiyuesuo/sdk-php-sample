<?php
header("Content-Type: text/html; charset=utf-8");
/** 
* 合同接收人信息
*/ 
class Receiver {
	public $type;//接收人类型  PERSONAL（个人），COMPANY（公司），PLATFORM(平台）
	public $name;//个人姓名（或公司名称）
	public $mobile;//个人手机号/公司经办人手机号
	public $ordinal;//签署顺序；从1开始
	public $authLevel;//认证级别；BASIC（初级认证），FULL（加强认证）
	public $legalPersonRequired;//是否需要签署法人章
	

	function __construct($type){  
		$this->type = $type;  
    }  
    

    
	public function set_legalPersonRequired($legalPersonRequired) {
        $this->legalPersonRequired= $legalPersonRequired;
    }
    
	public function set_type($type) {
        $this->type=$type;
    }
    
	public function set_name($name) {
        $this->name=$name;
    }
    
	public function set_mobile($mobile) {
        $this->mobile=$mobile;
    }
    
	public function set_ordinal($ordinal) {
        $this->ordinal=$ordinal;
    }
    
	public function set_authLevel($authLevel) {
        $this->authLevel=$authLevel;
    }
}

