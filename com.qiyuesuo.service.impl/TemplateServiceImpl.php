<?php
header("Content-Type: text/html; charset=utf-8");
require_once(dirname(__FILE__).'/'."../com.qiyuesuo.service/TemplateService.php");
class TemplateServiceImpl implements TemplateService{
	const  CONTRACT_TEMPLATE ="/template";
	const  CONTRACT_TEMPLATE_DETAIL ="/template/detail?id=";
	private $SDk;
	function __construct($SDk){
		$this->SDk = $SDk;
	}
	
	function queryTemplate(){
		$serviceUrl = self::CONTRACT_TEMPLATE;
		return $this->SDk->service($serviceUrl,null);
	}
	
	function queryTemplateDetail($templateId){
		$serviceUrl = self::CONTRACT_TEMPLATE_DETAIL.$templateId;
		return $this->SDk->service($serviceUrl,null);
	}
}