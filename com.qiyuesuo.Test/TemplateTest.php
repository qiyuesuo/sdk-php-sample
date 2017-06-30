<?php
		/** 
		* 合同模板接口测试
		* @author      xushuai
		* @version     1.0 
		*/  
		require_once("../com.qiyuesuo.service.impl/TemplateServiceImpl.php");
		require_once("../com.qiyuesuo.common/Receiver.php");
		require_once("../com.qiyuesuo.common/Helper.php");
		require_once("../com.qiyuesuo.common/SDKClient.php");
		require_once "../com.qiyuesuo.common/Util.php";
		$url = Util::url;
		$accessKey = Util::accessKey;
		$accessSecret = Util::accessSecret;
		$SDk = new SDKClient($accessKey, $accessSecret, $url);
		$templateServiceImpl = new TemplateServiceImpl($SDk);
		
		//>>>>>>>>>>>>>>>>>>1. 查询合同模板>>>>>>>>>>>>>>>>>>
		$result = $templateServiceImpl->queryTemplate();
		print_r($result);
		
		
		/*返回：
		 * 
		 * Array
		(
		    [code] => 0
		    [templates] => Array
		        (
		            [0] => Array
		                (
		                    [id] => 2305581810964336993
		                    [templateType] => FORM
		                    [title] => 12345
		                    [parameters] => Array
		                        (
		                            [0] => Array
		                                (
		                                    [name] => name
		                                    [htmlType] => input
		                                    [paramType] => text
		                                    [description] => 名字
		                                    [required] => 
		                                )
		
		                            [1] => Array
		                                (
		                                    [name] => mobile
		                                    [htmlType] => input
		                                    [paramType] => text
		                                    [description] => 手机
		                                    [required] => 
		                                )
		
		                        )
		
		                )
		
		        )
		
		    [message] => SUCCESS
		)*/
		
		
		//>>>>>>>>>>>>>>>>>>2 .查询合同模板详情>>>>>>>>>>>>>>>>>>
		//入参：templateId	String	是	合同模板id
		$result =  $templateServiceImpl->queryTemplateDetail('2305581810964336993');
		print_r($result);
		