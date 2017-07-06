<?php
header("Content-Type: text/html; charset=utf-8");
class Company{
	public $name;//企业名称
	public $registerNo;//工商注册号
	public $email;//公司邮箱
	public $telephone;//联系电话
	public $address;//公司地址
	public $contact;//联系人姓名
	
	public $legalPerson;//法人姓名
	public $legalPersonId;//法人证件号
	
	//__set()方法用来设置私有属性 
	public function __set($name,$value){ 
		$this->$name = $value; 
	} 
	//__get()方法用来获取私有属性 
	public function __get($name){ 
		return $this->$name; 
	} 
	
	public function get_array(){
		$arr = array();  
		if($this->name){
			array_push($arr, $this->name);  
		}
		
        
	}
}