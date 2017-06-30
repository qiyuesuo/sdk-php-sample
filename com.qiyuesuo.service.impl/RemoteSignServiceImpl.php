<?php
require_once("../com.qiyuesuo.service/RemoteSignService.php");
require_once("../com.qiyuesuo.common/Helper.php");
class RemoteSignServiceImpl implements RemoteSignService{
	const CREATE_CONTRACTBYFILE= "/remote/contract/createbyfile";
	const CREATE_CONTRACTBYTEMPLATE="/remote/contract/createbytemplate";
	const CREATE_CONTRACTBYHTML="/remote/contract/createbyhtml";
	const UPLOAD_DOCUMENTBYFILE="/remote/contract/document/addbyfile";
	const UPLOAD_DOCUMENTBYTEMPLATE="/remote/contract/document/addbytemplate";
	const PLATFORM_SIGN_CONTRACT="/remote/signbyplatform";
	const COMPANY_SIGN_CONTRACT="/remote/signbycompany";
	const PERSON_SIGN_CONTRACT="/remote/signbyperson";
	const COMPLETE_CONTRACT="/remote/complete";
	const DOWNLOAD_CONTRACT="/remote/contract/download";
	const DOWNLOAD_DOCUMENT="/remote/document/download";
	const CONTRACT_DETAIL="/remote/contract/detail";
	const SIGN_URL="/remote/contract/signurl";
	const VIEW_URL="/remote/contract/viewurl";
	
	private $SDk;
	function __construct($SDk){
		$this->SDk = $SDk;
	}
	
	public function createByLocal($post_data){
		$check_result = checkRemote($post_data,'createByLocal');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::CREATE_CONTRACTBYFILE;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	public function createByHtml($post_data){
		$check_result = checkRemote($post_data,'createByHtml');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::CREATE_CONTRACTBYHTML;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	public function createByTemplate($post_data){
		$check_result = checkRemote($post_data,'createByTemplate');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::CREATE_CONTRACTBYTEMPLATE;
		
		$post_data = http_build_query($post_data);
		return $this->SDk->service($serviceUrl,$post_data);
	}
	public function signByPlatform($post_data){
		$check_result = checkRemote($post_data,'signByPlatform');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::PLATFORM_SIGN_CONTRACT;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	public function signBycompany($post_data){
		$check_result = checkRemote($post_data,'signBycompany');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::COMPANY_SIGN_CONTRACT;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	public function signByPerson($post_data){
		$check_result = checkRemote($post_data,'signByPerson');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::PERSON_SIGN_CONTRACT;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	public function complete($post_data){
		$serviceUrl = self::COMPLETE_CONTRACT;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	public function detail($documentId){
		$serviceUrl = self::CONTRACT_DETAIL.'?documentId='.$documentId;
		
		return $this->SDk->service($serviceUrl,null);
	}
	
/*	function downloadZip($documentId,$path){
		$serviceUrl = self::DOWNLOAD_CONTRACT.'?documentId='.$documentId;
		
		$output = $this->SDk->service($serviceUrl,null);

		return checkDownloadAndReturn($output,$path);
	}*/
	
	function downloadZip($documentId){
		$check_result = checkDown($documentId);
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::DOWNLOAD_CONTRACT.'?documentId='.$documentId;
		
		$output = $this->SDk->service($serviceUrl,null);
		
		return $output;
	}

	
/*	function downloadPdf($documentId, $path){
		$serviceUrl = self::DOWNLOAD_DOCUMENT.'?documentId='.$documentId;
		
		$output = $this->SDk->service($serviceUrl,null);

		return checkDownloadAndReturn($output,$path);
	}*/
	
	function downloadPdf($documentId){
		$check_result = checkDown($documentId);
		if(!($check_result['code']===0)){
			return $check_result;
		}
		
		$serviceUrl = self::DOWNLOAD_DOCUMENT.'?documentId='.$documentId;
		
		$output = $this->SDk->service($serviceUrl,null);

		return $output;
	}
	
	function signUrl($post_data){
		$check_result = checkRemoteSignurl($post_data,'signUrl');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::SIGN_URL;
		
		$post_data = http_build_query($post_data);
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	function viewUrl($post_data){
		$serviceUrl = self::VIEW_URL;
		
		$post_data = http_build_query($post_data);
		return $this->SDk->service($serviceUrl,$post_data);
		
	}
}