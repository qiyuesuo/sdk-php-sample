<?php
header("Content-Type: text/html; charset=utf-8");
require_once(dirname(__FILE__).'/'."../com.qiyuesuo.service/RemoteSignService.php");
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
	const CALLBACKCHECKOUT_URL="/remote/contract/callbackcheckout";
	
	private $SDk;
	function __construct($SDk){
		$this->SDk = $SDk;
	}
	
	public function createByLocal(Contract $contract){
		$post_data = array(
		    "subject" => $contract->get_subject(),//合同主题
		    "expireTime" => $contract->get_expireTime(),//合同过期时间；过期未结束签署，则作废，不传该参数则默认30天后过期。
		    "docName" => $contract->get_docName(),//合同文件名称
			"file" => $contract->get_file()//合同文件
		);
		$check_result = checkRemote($post_data,'createByLocal');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::CREATE_CONTRACTBYFILE;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	public function createByHtml(Contract $contract){
		$post_data = array(
		    "subject" => $contract->get_subject(),//合同主题
		    "expireTime" => $contract->get_expireTime(),//合同过期时间；过期未结束签署，则作废，不传该参数则默认30天后过期。
		    "docName" => $contract->get_docName(),//合同文件名称
			"html" => $contract->get_html()//html格式的合同
		);
		$check_result = checkRemote($post_data,'createByHtml');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::CREATE_CONTRACTBYHTML;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	public function createByTemplate(Contract $contract){
		$post_data = array(
		    "subject" => $contract->get_subject(),//合同主题
		    "expireTime" => $contract->get_expireTime(),//合同过期时间；过期未结束签署，则作废，不传该参数则默认30天后过期。
			"templateId"=>$contract->get_templateId(),
		    "docName" => $contract->get_docName(),//合同文件名称
			"templateParams" => $contract->get_templateParams()//合同文件
		);
		$check_result = checkRemote($post_data,'createByTemplate');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::CREATE_CONTRACTBYTEMPLATE;
		
		$post_data = http_build_query($post_data);
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	/**
	 * 运营方签署  带签名外观
	 */
	 public function signByPlatform($documentId,$sealId,Stamper $stamper){
		$templates = array(
            'offsetX'=>$stamper->get_offsetX(),
            'offsetY'=>$stamper->get_offsetY(),
            'page'=>$stamper->get_page()
        );
		$post_data = array(
			"acrossPagePosition"=>$stamper->get_acrossPagePosition(),//骑缝章
            "documentId" => $documentId,//合同文件在契约锁的唯一标识
            "visible" => true,//带签名外观,visible:印章是否可见
            "sealId" => $sealId,//印章在契约锁的唯一标识
			"keyword"=> $stamper->get_keyword(),//关键字；用来确定印章的坐标位置
		    "keywordIndex"=>$stamper->get_keywordIndex(),//关键字索引，默认为1；取值范围：1到无穷大或-1到无穷小;1代表第一个；-1代表最后一个
            "location" => json_encode($templates)//印章坐标位置；JSON字符串，如：{"offsetX":0.5,"offsetY":0.5,"page":1}；
        );
		$check_result = checkRemote($post_data,'signByPlatform');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::PLATFORM_SIGN_CONTRACT;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	
	/**
	 * 运营方签署  不带签名外观
	 */
	public function signByPlatNoVisible($documentId){
		$post_data = array(
            "documentId" => $documentId,//合同文件在契约锁的唯一标识
            "visible" => false//不带签名外观
        );
		$check_result = checkRemote($post_data,'signByPlatform');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::PLATFORM_SIGN_CONTRACT;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	
	/**
	 * 企业用户签署 带签名外观
	 */
	 public function signBycompany($documentId,Company $company,$sealImageBase64,Stamper $stamper){
		$templates = array(
			'offsetX'=>$stamper->get_offsetX(),
            'offsetY'=>$stamper->get_offsetY(),
            'page'=>$stamper->get_page()
		);
		$post_data = array(
			"acrossPagePosition"=>$stamper->get_acrossPagePosition(),//骑缝章
		    "documentId" => $documentId,//合同文件在契约锁的唯一标识
		    "visible" => true,
			"sealImageBase64" =>$sealImageBase64,
			"keyword"=> $stamper->get_keyword(),//关键字；用来确定印章的坐标位置
		    "keywordIndex"=>$stamper->get_keywordIndex(),//关键字索引，默认为1；取值范围：1到无穷大或-1到无穷小;1代表第一个；-1代表最后一个
		    "company" => json_encode($company),//企业用户信息；JSON字符串
			"location" => json_encode($templates)//印章坐标位置；JSON字符串
		);
		$check_result = checkRemote($post_data,'signBycompany');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::COMPANY_SIGN_CONTRACT;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	/**
	 * 企业用户签署 无签名外观
	 */
	public function signBycompanyNoVisible($documentId,Company $company){
		$post_data = array(
		    "documentId" => $documentId,//合同文件在契约锁的唯一标识
		    "visible" => 0,
		    "company" => json_encode($company)//企业用户信息；JSON字符串
		);
		$check_result = checkRemote($post_data,'signBycompany');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::COMPANY_SIGN_CONTRACT;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	
	/**
	 * 个人用户签署 带签名外观
	 */
	public function signByPerson($documentId,Person $person,$sealImageBase64,Stamper $stamper){
		$templates = array(
			'offsetX'=>$stamper->get_offsetX(),
            'offsetY'=>$stamper->get_offsetY(),
            'page'=>$stamper->get_page()
		);
		$post_data = array(
		    "documentId" => $documentId,
		    "visible" => true,//带签名外观
			"sealImageBase64" =>$sealImageBase64,
			"keyword"=> $stamper->get_keyword(),//关键字；用来确定印章的坐标位置
		    "keywordIndex"=>$stamper->get_keywordIndex(),//关键字索引，默认为1；取值范围：1到无穷大或-1到无穷小;1代表第一个；-1代表最后一个
		    "person" => json_encode($person),//个人用户信息；JSON字符串
			"location" => json_encode($templates)
		);
		
		$check_result = checkRemote($post_data,'signByPerson');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::PERSON_SIGN_CONTRACT;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	/**
	 * 个人用户签署 无签名外观
	 */
	function signByPersonNoVisible($documentId,Person $person){
		$post_data = array(
		    "documentId" => $documentId,
		    "visible" => 0,//带签名外观
		    "person" => json_encode($person)//个人用户信息；JSON字符串
		);
		
		$check_result = checkRemote($post_data,'signByPerson');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::PERSON_SIGN_CONTRACT;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	
	
	public function complete($documentId){
		
		$post_data = array(
		    "documentId" => $documentId
		);
		
		$serviceUrl = self::COMPLETE_CONTRACT;
		
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	public function detail($documentId){
		$serviceUrl = self::CONTRACT_DETAIL.'?documentId='.$documentId;
		
		return $this->SDk->service($serviceUrl,null);
	}
	

	
	function downloadZip($documentId){
		$check_result = checkDown($documentId);
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::DOWNLOAD_CONTRACT.'?documentId='.$documentId;
		
		$output = $this->SDk->service($serviceUrl,null);
		
		return $output;
	}


	
	function downloadPdf($documentId){
		$check_result = checkDown($documentId);
		if(!($check_result['code']===0)){
			return $check_result;
		}
		
		$serviceUrl = self::DOWNLOAD_DOCUMENT.'?documentId='.$documentId;
		
		$output = $this->SDk->service($serviceUrl,null);

		return $output;
	}
	
	function signUrlCompany($documentId,$sealImageBase64,$successUrl,$signCallBackUrl,$operation,Company $company,Stamper $stamper){
		$templates = array(
			'offsetX'=>$stamper->get_offsetX(),
            'offsetY'=>$stamper->get_offsetY(),
			"keyword"=> $stamper->get_keyword(),//关键字；用来确定印章的坐标位置
		    "keywordIndex"=>$stamper->get_keywordIndex(),//关键字索引，默认为1；取值范围：1到无穷大或-1到无穷小;1代表第一个；-1代表最后一个
            'page'=>$stamper->get_page()
		);
		$Signer = array(
			'type'=>'COMPANY',//用户类型；COMPANY（公司）
		    'name'=>$company->name,//用户名称
			'registerNo'=>$company->registerNo,//公司工商注册号（type为COMPANY时必须）
			'mobile'=>$company->telephone//个人手机号（联系人手机号）
		);
		$post_data = array(
		    "documentId" => $documentId,//合同文件的唯一标识
			"operation" => $operation,//操作类型；SIGN（签署），SIGNWITHPIN（手机验证签署）
			"signer" => json_encode($Signer),//签署人；JSON字符串
			"sealImageBase64" =>$sealImageBase64,
			"signCallBackUrl" =>$signCallBackUrl,//回调地址
			"acrossPagePosition" => $stamper->get_acrossPagePosition(),//骑缝章纵坐标百分比
			"location" => json_encode($templates),//印章位置：非空时印章位置固定；为空时签署人可以拖动印章；
			"successUrl" => $successUrl//签署成功后跳转的url
		);
		
		$check_result = checkRemoteSignurl($post_data,'signUrl');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::SIGN_URL;
		
		$post_data = http_build_query($post_data);
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	
	
	function signUrlPerson($documentId,$sealImageBase64,$successUrl,$signCallBackUrl,$operation,Person $person,Stamper $stamper){
		$templates = array(
			'offsetX'=>$stamper->get_offsetX(),
            'offsetY'=>$stamper->get_offsetY(),
			"keyword"=> $stamper->get_keyword(),//关键字；用来确定印章的坐标位置
		    "keywordIndex"=>$stamper->get_keywordIndex(),//关键字索引，默认为1；取值范围：1到无穷大或-1到无穷小;1代表第一个；-1代表最后一个
            'page'=>$stamper->get_page()
		);
		$Signer = array(
			'type'=>'PERSONAL',//用户类型；PERSONAL（个人）
		    'name'=>$person->name,//用户名称
			'paperType'=>$person->paperType,//证件类型（idcard非空时必填）；IDCARD（居民二代身份证）、PASSPORT（护照）、OTHER（其他）
			'idcard'=>$person->idcard,//个人证件号（type为PERSONAL时必须）
			'mobile'=>$person->mobile
		);
		$post_data = array(
		    "documentId" => $documentId,//合同文件的唯一标识
			"operation" => $operation,//操作类型；SIGN（签署），SIGNWITHPIN（手机验证签署）
			"signer" => json_encode($Signer),//签署人；JSON字符串
			"sealImageBase64" =>$sealImageBase64,
			"signCallBackUrl" =>$signCallBackUrl,//回调地址
			"location" => json_encode($templates),//印章位置：非空时印章位置固定；为空时签署人可以拖动印章；
			"successUrl" => $successUrl//签署成功后跳转的url
		);
		
		$check_result = checkRemoteSignurl($post_data,'signUrl');
		if(!($check_result['code']===0)){
			return $check_result;
		}
		$serviceUrl = self::SIGN_URL;
		
		$post_data = http_build_query($post_data);
		return $this->SDk->service($serviceUrl,$post_data);
	}
	
	function viewUrl($documentId){
		$post_data = array(
		    "documentId" => $documentId//String	合同文件在契约锁的唯一标识
		);
		$serviceUrl = self::VIEW_URL;
		$post_data = http_build_query($post_data);
		return $this->SDk->service($serviceUrl,$post_data);
		
	}

	function callbackcheckout($signCallBackUrl){
		$post_data = array(
		    "signCallBackUrl" => $signCallBackUrl//String回调地址
		);
		$serviceUrl = self::CALLBACKCHECKOUT_URL;
		$post_data = http_build_query($post_data);
		return $this->SDk->service($serviceUrl,$post_data);
	}
}