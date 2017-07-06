<?php
header("Content-Type: text/html; charset=utf-8");
require_once(dirname(__FILE__).'/'."../com.qiyuesuo.service/SealService.php");
class SealServiceimpl implements SealService{
	const FIND_COMPANYSEAL ='/seal?sealId=';
	const CREATE_SEALBYCOMPANY = "/seal/companyseal";
	const PLATFORM_SEAL_LIST = "/seal/list";
	const CREATE_SEALBYPERSONAL = "/seal/personalseal";
	const ERROR_INVALID_MESSAGE = "无效的请求参数:";
	private $SDk;
	function __construct($SDk){
		$this->SDk = $SDk;
	}
	public function findSeal($sealId){
		if(!is_string($sealId)){
			$result = array(
				'code'=>1005,
			    'message'=>self::ERROR_INVALID_MESSAGE.$sealId
			);
			return $result;
		}
		$serviceUrl = self::FIND_COMPANYSEAL.$sealId;
		return $this->SDk->service($serviceUrl,null);
	}
	public function isString(){
		
	}
	public function  generateSeal($companyName){
		if(!is_string($companyName)){
			$result = array(
				'code'=>1005,
			    'message'=>self::ERROR_INVALID_MESSAGE.$companyName
			);
			return $result;
		}
		$serviceUrl = self::CREATE_SEALBYCOMPANY;
		
		$post_data = array ("name"=>$companyName);
		$post_data = http_build_query($post_data);
		return $this->SDk->service($serviceUrl,$post_data);
	}
	public function generatePersonalSeal($personalName){
		if(!is_string($personalName)){
			$result = array(
				'code'=>1005,
			    'message'=>self::ERROR_INVALID_MESSAGE.$personalName
			);
			return $result;
		}
		$serviceUrl = self::CREATE_SEALBYPERSONAL;
		
		$post_data = array ("name"=>$personalName);
		$post_data = http_build_query($post_data);
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	public function sealList(){
		$serviceUrl = self::PLATFORM_SEAL_LIST;
		
		return $this->SDk->service($serviceUrl,null);
	}
}