<?php
		/** 
		* 远程签接口测试
		* @author      xushuai
		* @version     1.0 
		*/  
		require_once("../com.qiyuesuo.service.impl/RemoteSignServiceImpl.php");
		require_once("../com.qiyuesuo.common/Receiver.php");
		require_once("../com.qiyuesuo.common/Helper.php");
		require_once("../com.qiyuesuo.common/SDKClient.php");
		require_once "../com.qiyuesuo.common/Util.php";
		
		$url = Util::url;
		$accessKey = Util::accessKey;
		$accessSecret = Util::accessSecret;
		
		$SDk = new SDKClient($accessKey, $accessSecret, $url);
		$remoteSignServiceImpl = new RemoteSignServiceImpl($SDk);
		//***********************************************************************1.1 由本地PDF文件创建
		$file_name = "D:/demo.pdf";
		$a1 = get_millistime();
		$post_data = array(
		    "subject" => "xushuaiRemote文件创建",//合同主题
		    "expireTime" => "2017-07-08",//合同过期时间；过期未结束签署，则作废，不传该参数则默认30天后过期。
		    "docName" => "languageRemote",//合同文件名称
			//合同文件
			"file" => new \CURLFile(realpath($file_name))
		);
		$result =  $remoteSignServiceImpl->createByLocal($post_data);
		$a2 = get_millistime();
		$a3 = $a2-$a1;
		print_r($result);
		print_r("**************耗时：".$a3);
		
		/*		Array
		(
		    [code] => 0
		    [documentId] => 2310300463639077504
		    [message] => SUCCESS
		)
		*/
		
		
		
		
		
		//***********************************************************************1.2 由模版创建
		$templates = array(
			'name'=>'bob',
		    'mobile'=>'13487457854'
		);
		$post_data = array(
		    "subject" => "2017php-remote",//合同主题
		    "expireTime" => "2017-07-08",//合同过期时间；过期未结束签署，则作废，不传该参数则默认30天后过期。
			"templateId" => "2305581810964336993",//合同模板ID；合同模板在契约锁云平台维护，请到契约锁云平台查看模板ID
		    "docName" => "王府井",//合同文件名称
			"templateParams" => json_encode($templates)//合同模版参数，键值对形式字符串，如：｛“product”:“半年定期”, "amount": "10000"｝
		);
		
		$result = $remoteSignServiceImpl->createByTemplate($post_data);
		print_r($result);
		
		
		
		//***********************************************************************1.3 由html创建
		$post_data = array(
		    "subject" => "222remote-PHP-Html",//合同主题
		    "expireTime" => "2017-07-08",//合同过期时间；过期未结束签署，则作废，不传该参数则默认30天后过期。
		    "docName" => "222remotehtmlphplanguage2",//合同文件名称
			"html" => "<html><body><p>title</p><p>xushuai在线第三方电子合同平台。企业及个人用户可通过本平台与签约方快速完成合同签署，安全、合法、有效。</p></body></html>"//html格式的合同
		);
		$result = $remoteSignServiceImpl->createByHtml($post_data);
		print_r($result);
		
		
		
		
		//***********************************************************************2.1 运营方签署
		/* 
		 * 指定坐标位置签署
		 * --------------------------------------------------------------
		 * 平台签署,带签名外观
		 * --------------------------------------------------------------
		 */
		$templates = array(
            'offsetX'=>0.2,
            'offsetY'=>0.2,
            'page'=>1
        );
        $post_data = array(
            "documentId" => "2312793903439847826",//合同文件在契约锁的唯一标识
            "visible" => true,//带签名外观,visible:印章是否可见
            "sealId" => "2307419306108956847",//印章在契约锁的唯一标识
            "location" => json_encode($templates)//印章坐标位置；JSON字符串，如：{"offsetX":0.5,"offsetY":0.5,"page":1}；
        );

        $result =  $remoteSignServiceImpl->signByPlatform($post_data);
        print_r($result);
		
		
		/* 关键字签署：
		 * --------------------------------------------------------------
		 * 平台签署,带签名外观
		 * --------------------------------------------------------------
		 */
		$templates = array(
		    'offsetX'=>0.1,
		    'offsetY'=>-0.1
		);
		$post_data = array(
		    "documentId" => "2312793903439847826",//合同文件在契约锁的唯一标识
		    "visible" => true,//带签名外观   visible:印章是否可见
		    "keyword"=>"市",//关键字；用来确定印章的坐标位置
		    "keywordIndex"=>1,//关键字索引，默认为1；取值范围：1到无穷大或-1到无穷小;1代表第一个；-1代表最后一个
		    "sealId" => "2307419306108956847",//印章在契约锁的唯一标识
		    "location" => json_encode($templates)//印章坐标位置；JSON字符串，如：{"offsetX":0.5,"offsetY":0.5,"page":1}；
		);
		
		$result =  $remoteSignServiceImpl->signByPlatform($post_data);
		print_r($result);
		
		//***********************************************************************2.2 企业用户签署
		/* 指定坐标位置签署
		 * --------------------------------------------------------------
		 * 企业用户签署,带签名外观
		 * --------------------------------------------------------------
		 */
		$templates = array(
			'offsetX'=>0.5,
		    'offsetY'=>0.6,
			'page'=>1
		);
		$company = array(
			'name'=>'上海信息科技股份有限公司',
		    'telephone'=>'45782136589'
		);
		$post_data = array(
		    "documentId" => "2307469147923706171",//合同文件在契约锁的唯一标识
		    "visible" => true,
			//sealImageBase64:印章图片的base64格式数据；可以由运营方自行生成，也可以调用[印章接口-创建公司印章]来获取，印章数据不能大于20Kb
			"sealImageBase64" =>"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",
		    "company" => json_encode($company),//企业用户信息；JSON字符串
			"location" => json_encode($templates)//印章坐标位置；JSON字符串
		);
		$result =  $remoteSignServiceImpl->signBycompany($post_data);
		print_r($result);
		
		
		
		/* 关键字签署：
		 * --------------------------------------------------------------
		 * 企业用户签署,带签名外观
		 * --------------------------------------------------------------
		 */
		 $templates = array(
			'offsetX'=>0.02,
		    'offsetY'=>0.01
		);
		$company = array(
			'name'=>'上海信息科技股份有限公司',
		    'telephone'=>'45782136589'
		);
		$post_data = array(
		    "documentId" => "2307469147923706171",
		    "visible" => true,
			"sealImageBase64" =>"",
			"keyword"=>"***",//关键字；用来确定印章的坐标位置
			"keywordIndex"=>1,//关键字索引，默认为1；取值范围：1到无穷大/-1到无穷小 ；1代表第一个；-1代表最后一个
		    "company" => json_encode($company),//企业用户信息；JSON字符串
			"location" => json_encode($templates)//印章坐标位置；JSON字符串，如：{"offsetX":0.5,"offsetY":0.5,"page":1}
		);
		$result =  $remoteSignServiceImpl->signBycompany($post_data);
		print_r($result);
		
		
		
		//***********************************************************************2.3 个人用户签署
		/* 指定坐标位置签署
		 * --------------------------------------------------------------
		 * 个人用户签署,带签名外观
		 * --------------------------------------------------------------
		 */
		$templates = array(
			'offsetX'=>0.9,
		    'offsetY'=>0.7,
			'page'=>1
		);
		$person = array(
			'name'=>'丁武',//用户姓名
		    'mobile'=>'45782136589'//手机号
		);
		$post_data = array(
		    "documentId" => "2307469147923706171",
		    "visible" => true,
			"sealImageBase64" =>"iVBORw0KGgoAAAANSUhEUgAAALQAAABkCAYAAAAv8xodAAABh0lEQVR42u3dUW7CQAxF0ex/02EBgFDETGI/nyPxVxXVvkwAFXEcAAAAAAAAAAAAAAAAAAAAAAAAAMBO548b73OiSbzCvjYnGoQ7bYHmEhxs8vLMZGiwXRdoFmJtszwPZEGau5n1iNnVzfxav4NgKdfn/+1nWRz2yvvB7G4bmsUIGou59SrKgCuBgwBBCxpBi9mCLEfQgjYvMxO0eWFB5oUFmZcFWZBZWZJZYUnzZuWdEUG3n5X/pRZ06zn5gICg28/Jp4YELVxRC7pLsCvuF0E/EvWO+0XQW6NePSMxP7TcqX/77ge9mAUddQUTtKBjghazoAWNoKvORtCCjn/+jKAFjWFXeKCbsaCdznixImiLM3BPNwTtdPaiW9CCFrSgPd1A0E5nCzT4ikH7UICgS52on36fzyIKuuzp7ItRb1rMv5czQfuq6VYnzeRL2DngZnEhwzjdsg+k1GGIZ/BroNRHt9PNuxlxCxWuqCOXLFxRWz7ZUYOgoWLUEBM0AAAAAAAAAABQyAu58uZgb5mSegAAAABJRU5ErkJggg==",
		    "person" => json_encode($person),//个人用户信息；JSON字符串
			"location" => json_encode($templates)
		);
		$result =  $remoteSignServiceImpl->signByPerson($post_data);
		print_r($result);
		
		/* 关键字签署：
		 * 有了keyword，就不需要page
		 * --------------------------------------------------------------
		 * 个人用户签署  带签名外观
		 * --------------------------------------------------------------
		 */
 		$templates = array(
			'offsetX'=>0.01,
		    'offsetY'=>0.01
		);
		$person = array(
			'name'=>'丁武',
		    'mobile'=>'45782136589'
		);
		$post_data = array(
		    "documentId" => "2311746527772582652",
		    "visible" => true,
			"keyword"=>"***",//关键字；用来确定印章的坐标位置
			"keywordIndex"=>1,//关键字索引，默认为1；取值范围：1到无穷大/-1到无穷小 ；1代表第一个；-1代表最后一个
			"sealImageBase64" =>"iVBORw0KGgoAAAANSUhEUgAAALQAAABkCAYAAAAv8xodAAABh0lEQVR42u3dUW7CQAxF0ex/02EBgFDETGI/nyPxVxXVvkwAFXEcAAAAAAAAAAAAAAAAAAAAAAAAAMBO548b73OiSbzCvjYnGoQ7bYHmEhxs8vLMZGiwXRdoFmJtszwPZEGau5n1iNnVzfxav4NgKdfn/+1nWRz2yvvB7G4bmsUIGou59SrKgCuBgwBBCxpBi9mCLEfQgjYvMxO0eWFB5oUFmZcFWZBZWZJZYUnzZuWdEUG3n5X/pRZ06zn5gICg28/Jp4YELVxRC7pLsCvuF0E/EvWO+0XQW6NePSMxP7TcqX/77ge9mAUddQUTtKBjghazoAWNoKvORtCCjn/+jKAFjWFXeKCbsaCdznixImiLM3BPNwTtdPaiW9CCFrSgPd1A0E5nCzT4ikH7UICgS52on36fzyIKuuzp7ItRb1rMv5czQfuq6VYnzeRL2DngZnEhwzjdsg+k1GGIZ/BroNRHt9PNuxlxCxWuqCOXLFxRWz7ZUYOgoWLUEBM0AAAAAAAAAABQyAu58uZgb5mSegAAAABJRU5ErkJggg==",
		    "person" => json_encode($person),
			"location" => json_encode($templates)
		);
		$result =  $remoteSignServiceImpl->signByPerson($post_data);
		print_r($result);
		
		
		
		//***********************************************************************3.1 完成签署
		$post_data = array(
		    "documentId" => "2317563155119887047"
		);
		$result = $remoteSignServiceImpl->complete($post_data);
		print_r($result);
		
		
		
		//***********************************************************************4.1 查询合同详情
		//入参：String     documentId:合同文件的唯一标识
		$result = $remoteSignServiceImpl->detail('2307469147923706171');
		print_r($result);
		/*响应：
		 * Array
		(
		    [code] => 0
		    [contract] => Array
		        (
		            [id] => 2307469147521052984
		            [subject] => remote-PHP-Html
		            [sender] => 亘岩
		            [publishTime] => 2017-05-31 17:38:35
		            [lastSignTime] => 2017-05-31 18:30:11
		            [expireTime] => 2017-07-08 00:00:00
		            [status] => COMPLETE
		            [version] => 4
		            [signedCount] => 4
		            [documents] => Array
		                (
		                    [0] => Array
		                        (
		                            [id] => 2307469147923706171
		                            [title] => remotehtmlphplanguage2
		                            [createTime] => 2017-05-31 17:38:36
		                        )
		                )
		            [signedSigners] => Array
		                (
		                    [0] => Array
		                        (
		                            [type] => COMPANY
		                            [name] => 亘岩
		                            [registerNo] => 310225000655831
		                            [signTime] => 2017-05-31 17:53:01
		                        )
		                    [1] => Array
		                        (
		                            [type] => COMPANY
		                            [name] => 上海信息科技股份有限公司
		                            [signTime] => 2017-05-31 18:19:58
		                        )
		
		                    [2] => Array
		                        (
		                            [type] => PERSONAL
		                            [name] => 李萌
		                            [mobile] => 45782136589
		                            [signTime] => 2017-05-31 18:22:16
		                        )
		                )
		        )
		    [message] => SUCCESS
		)

		 * */
		
		//***********************************************************************5.1 下载合同清单
		//入参：String     documentId:合同文件的唯一标识
		//$result = $remoteSignServiceImpl->downloadZip('2307469147923706171');
		//print_r($result);
		
		
		//***********************************************************************5.2 下载单个合同文件
		//入参：String     documentId:合同文件的唯一标识
		//$result =  $remoteSignServiceImpl->downloadPdf('2307469147923706171');
		//print_r($result);
		
		//***********************************************************************6.1 获取签署页面链接
		//---------6.1.1 COMPANY（公司）签署页面链接   请求示例：
		$templates = array(
			'offsetX'=>0.4,
		    'offsetY'=>0.4,
			'page'=>1
		);
		$Signer = array(
			'type'=>'COMPANY',
		    'name'=>'上海信息科技',
			'registerNo'=>'1114447778547'
		);
		$post_data = array(
		    "documentId" => "2317563155119887047",//合同文件的唯一标识
			"operation" => "SIGN",//操作类型；SIGN（签署），SIGNWITHPIN（手机验证签署）
			"signer" => json_encode($Signer),//签署人；JSON字符串
			"sealImageBase64" =>"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",
			"location" => json_encode($templates),//印章位置：非空时印章位置固定；为空时签署人可以拖动印章；
			"successUrl" => "https://www.baidu.com/"//签署成功后跳转的url
		);
		$result =  $remoteSignServiceImpl->signUrl($post_data);
		print_r($result);
		
		
		
		//---------- 6.1.2 PERSONAL（个人）签署页面链接       请求示例：
		$templates = array(
            'offsetX'=>0.4,
            'offsetY'=>0.4,
            'page'=>1
        );
        $Signer = array(
            'type'=>'PERSONAL',//用户类型；PERSONAL（个人）
            'name'=>'张三',//用户名称
            'paperType'=>'IDCARD',//证件类型（idcard非空时必填）；IDCARD（居民二代身份证）、PASSPORT（护照）、OTHER（其他）
            'idcard'=>'420683199203047856'//个人证件号（type为PERSONAL时必须）
        );
        $post_data = array(
            "documentId" => "2314684504302456997",
            "operation" => "SIGN",//操作类型；SIGN（签署），SIGNWITHPIN（手机验证签署）
            "signer" => json_encode($Signer),//签署人；JSON字符串
            "sealImageBase64" =>"",//印章图片的base64格式数据；可以由运营方自行生成，也可以调用[印章接口]来获取，印章数据不能大于20Kb
            "location" => json_encode($templates),
            "successUrl" => "https://www.baidu.com/"//签署成功后跳转的url
        );
        $result =  $remoteSignServiceImpl->signUrl($post_data);
        print_r($result);
        
        
        /* 响应：
         * Array
		(
		    [code] => 0
		    [signUrl] => https://expose.qiyuesuo.me/sign/remote?token=RU1DWFE4ZDcybENGV3A0WURxSmJnVjUzSElCdDRvRFFPYXppbVVTSFo5MkcyV3YrZ1lNeW1IcExzUjNnenkzaA==
		    [message] => SUCCESS
		    [token] => RU1DWFE4ZDcybENGV3A0WURxSmJnVjUzSElCdDRvRFFPYXppbVVTSFo5MkcyV3YrZ1lNeW1IcExzUjNnenkzaA==
		)*/
		
		
		//***********************************************************************6.2 获取查看合同页面的链接
		$post_data = array(
		    "documentId" => "2312209302023610988"//String	合同文件在契约锁的唯一标识
		);
		$result =  $remoteSignServiceImpl->viewUrl($post_data);
		print_r($result);
		
		
		//返回值：
		/*Array
(
    [code] => 0
    [viewUrl] => https://expose.qiyuesuo.me/sign/remote?token=ZmlqZkI0WG15UlB0RFprRkU4NXN2bFZ5MXYxQ2NIZDJDeGYveFJKQ0kvUGxDRUlESHk4NktzaUFFcWhwTEJETw==
    [message] => SUCCESS
    [token] => ZmlqZkI0WG15UlB0RFprRkU4NXN2bFZ5MXYxQ2NIZDJDeGYveFJKQ0kvUGxDRUlESHk4NktzaUFFcWhwTEJETw==
)*/