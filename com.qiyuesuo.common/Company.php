<?php
header("Content-Type: text/html; charset=utf-8");
class Company{
	public $name;
	public $registerNo;
	public $email;
	public $telephone;
	public $address;
	public $contact;
	public $legalPerson;
	public $legalPersonId;
	
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