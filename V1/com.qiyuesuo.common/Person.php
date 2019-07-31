<?php
header("Content-Type: text/html; charset=utf-8");
class Person{
	public $name;//用户姓名
	public $idcard;//证件号码
	public $mobile;//手机号
	public $email;//邮箱
	public $gender;//性别。'MALE'  男, 'FEMALE'   女
	public $paperType;//证件类型（idcard非空时必填）；IDCARD（居民二代身份证）、PASSPORT（护照）、OTHER（其他）
	
	//__set()方法用来设置私有属性 
	public function __set($name,$value){ 
		$this->$name = $value; 
	} 
	//__get()方法用来获取私有属性 
	public function __get($name){ 
		return $this->$name; 
	} 
}