<?php
require_once("../com.qiyuesuo.service/StandardSignService.php");
require_once("../com.qiyuesuo.common/Helper.php");
class StandardSignServiceImpl implements StandardSignService{
	const  FIND_COMPANYSEAL ='/seal?sealId=';
	const  CREATE_CONTRACT="/standard/contract/create";
	const  CREATE_CONTRACTBYFILE="/standard/contract/createbyfile";
	const  CREATE_CONTRACTBYTEMPLATE="/standard/contract/createbytemplate";
	const  CREATE_CONTRACTBYHTML="/standard/contract/createbyhtml";
	const  PLATFORM_SIGN="/standard/contract/sign";
	const  LEGALPERSON_SIGN="/standard/contract/signbylegalperson";
	const  QUERY_CONTRACTDETAIL="/standard/contract/detail";
	const  DOWNLOAD_CONTRACT="/standard/contract/download";
	const  DOWNLOAD_DOCUMENT="/standard/document/download";
	const  CONTRACT_SIGNURL="/standard/contract/signurl";
	const  CONTRACT_CATEGORY="/standard/category";
	
	private $SDk;
	function __construct($SDk){
		$this->SDk = $SDk;
	}
	
	public function createByLocal($post_data){
		$check_result = check($post_data,'createByLocal');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		
		$serviceUrl = self::CREATE_CONTRACTBYFILE;
		
		$result = $this->SDk->service($serviceUrl,$post_data);
		return $result;
	}
	
	public function createByHtml($post_data){
		$check_result = check($post_data,'createByHtml');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		
		$serviceUrl = self::CREATE_CONTRACTBYHTML;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	public function createByTemplate($post_data){
		$check_result = check($post_data,'createByTemplate');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		
		$serviceUrl = self::CREATE_CONTRACTBYTEMPLATE;
		
		$post_data = http_build_query($post_data);
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	public function sign($post_data){
		$check_result = checkSign($post_data,'signStand');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::PLATFORM_SIGN;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	public function signbylegalperson($post_data){
		$check_result = checkSign($post_data,'lpSignStand');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::LEGALPERSON_SIGN;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	public function detail($documentId){
		if(!is_string($documentId)||!$documentId){
			$result = array(
				'code'=>'1005',
			    'message'=>'合同文档ID参数出错'
			);
			return $result;
		}
		$serviceUrl = self::QUERY_CONTRACTDETAIL.'?documentId='.$documentId;
		
		return $this->SDk->service($serviceUrl,null);
	}
	
/*	public function download($documentId,$path){
		$check_result = checkDown($documentId,$path);
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::DOWNLOAD_CONTRACT.'?documentId='.$documentId;
		
		$output = $this->SDk->service($serviceUrl,null);
		return checkDownloadAndReturn($output,$path);
	}*/
	
	public function download($documentId){
		$check_result = checkDown($documentId);
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::DOWNLOAD_CONTRACT.'?documentId='.$documentId;
		
		$output = $this->SDk->service($serviceUrl,null);
		return $output;
	}
	
/*	public function downloadDoc($documentId,$path){
		$check_result = checkDown($documentId,$path);
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::DOWNLOAD_DOCUMENT.'?documentId='.$documentId;
		
		$output = $this->SDk->service($serviceUrl,null);
		return checkDownloadAndReturn($output,$path);
	}*/
	
	public function downloadDoc($documentId){
		$check_result = checkDown($documentId);
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::DOWNLOAD_DOCUMENT.'?documentId='.$documentId;
		
		$output = $this->SDk->service($serviceUrl,null);
		return $output;
	}
	
	public function queryCategory(){
		$serviceUrl = self::CONTRACT_CATEGORY;
		
		return $this->SDk->service($serviceUrl,null);
	}
	
}