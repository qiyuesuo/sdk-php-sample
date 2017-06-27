<?php
		require_once("phar://../com.phar/phpSDK.phar/com.qys.service.impl/TemplateServiceImpl.php");
		require_once("phar://../com.phar/phpSDK.phar/com.qys.common/SDKClient.php");
		
		require_once "Util.php";
		$url = Util::url;
		$accessKey = Util::accessKey;
		$accessSecret = Util::accessSecret;
		
		
		$SDk = new SDKClient($accessKey, $accessSecret, $url);
		$templateServiceImpl = new TemplateServiceImpl($SDk);
		//*************************合同模板接口*******************************************************************************************************************
		
		
		//----------------------1 查询合同模板
		
		$result = $templateServiceImpl->queryTemplate();
		print_r($result);
		
		
		/*Array
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
		
		
		//----------------------2 查询合同模板详情
		/*$result =  $templateServiceImpl->queryTemplateDetail('2305581810964336993');
		print_r($result);*/
		