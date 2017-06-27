<?php
		require_once("phar://../com.phar/phpSDK.phar/com.qys.service.impl/StandardSignServiceImpl.php");
		require_once("phar://../com.phar/phpSDK.phar/com.qys.common/Receiver.php");
		require_once("phar://../com.phar/phpSDK.phar/com.qys.common/SDKClient.php");
		
		require_once "Util.php";
		$url = Util::url;
		$accessKey = Util::accessKey;
		$accessSecret = Util::accessSecret;
		
		$SDk = new SDKClient($accessKey, $accessSecret, $url);
		//*************************标准签接口*******************************************************************************************************************
		
		$standardSignServiceImpl = new StandardSignServiceImpl($SDk);
		//-----------------------------------------------------------1.1 用本地PDF文件创建
		//无序--本地PDF文件创建
		//PERSONAL, COMPANY,PLATFORM
/*		$Receiver = new Receiver("PERSONAL");  
        $Receiver->set_name("徐嘟嘟");
        $Receiver->set_mobile("17717088943");
        $Receiver->set_authLevel("BASIC");

        $Receiver2 = new Receiver("PLATFORM"); 
        //是否需要签署法人章；默认false
        $Receiver2->set_legalPersonRequired(true);
        $arr = array();  
        array_push($arr, $Receiver);  
        array_push($arr, $Receiver2);  
        $json_string = json_encode($arr); 
        $file = "D:/t.pdf";
        $post_data = array(
            "subject" => "pdf2标准签中国人",
            "expireTime" => "2017-07-08",
            "docName" => "hsjsh哈哈哈",
            "receivers" => $json_string,
            "receiveType" =>"SIMUL",
            "file" => new \CURLFile(realpath($file))
        );
        $result = $standardSignServiceImpl->createByLocal($post_data);
        print_r($result);*/
        
        
		/*		Array
		(
		    [code] => 0
		    [documentId] => 2311852163688562692
		    [message] => SUCCESS
		)*/
		
		//创建合同接收人信息
		//有序--本地PDF文件创建
/* 		$Receiver = new Receiver("PERSONAL");  
        $Receiver->set_name("徐嘟嘟");
        $Receiver->set_mobile("17717088942");
        $Receiver->set_authLevel("BASIC");
        $Receiver->set_ordinal(2);


        $Receiver3 = new Receiver("PLATFORM"); 
        $Receiver3->set_ordinal(1);
        //是否需要签署法人章；默认false
        //$Receiver3->set_legalPersonRequired(true);


        $arr = array();  
        array_push($arr, $Receiver);  
        array_push($arr, $Receiver3);  
        $json_string = json_encode($arr); 
        $file = "D:/demo.pdf";
        $post_data = array(
            "subject" => "有序标准签中国人xsLocal2",
            "expireTime" => "2017-07-08",
            "docName" => "有序标准签合同测试Local2",
            "receivers" => $json_string,
            "file" => new \CURLFile(realpath($file))
        );
        $result =  $standardSignServiceImpl->createByLocal($post_data);
        print_r($result);*/
		//1001------余额不足**********=1653
		//{"code":0,"contractId":"2307438947809407027","documentId":"2307438947398365232","message":"SUCCESS"}
		//0--2308208094066950169--2308208093723017238--SUCCESS**********=3931
		//0--2308208314259521605--2308208313789759554--SUCCESS**********=3229  
/*		Array
			(
			    [code] => 0
			    [documentId] => 2310276952156750125
			    [message] => SUCCESS
			)*/
		
		//-----------------------------------------------------------1.2 用模板创建
		//模板创建  无序
		/*$Receiver = new Receiver("PERSONAL");  
        $Receiver->set_name("徐*");
        $Receiver->set_mobile("17717088***");
        $Receiver->set_authLevel("BASIC");

        $Receiver2 = new Receiver("COMPANY");  
        $Receiver2->set_name("上海亘岩");
        $Receiver2->set_mobile("17717088***");
        $Receiver2->set_authLevel("BASIC");

        $Receiver3 = new Receiver("PLATFORM"); 
        //是否需要签署法人章；默认false
        $Receiver3->set_legalPersonRequired(true);


        $arr =array();  
        array_push($arr, $Receiver);  
        array_push($arr, $Receiver2);  
        array_push($arr, $Receiver3);  
        $json_string = json_encode($arr); 

        $templates = array(
            'name'=>'帅哥0000',
            'mobile'=>'134871247850000'
        );
        $post_data = array(
            "subject" => "php0605-标准签-模板2017",
            "expireTime" => "2017-07-08",
            "templateId" => "2305581810964336993",
            "receivers" => $json_string,
            "docName" => "标准签php0605",
            "receiveType" =>"SIMUL",
            "templateParams" => json_encode($templates)
        );
        $result = $standardSignServiceImpl->createByTemplate($post_data);
        print_r($result);*/
		/*				Array
		(
		    [code] => 0
		    [contractId] => 2309308036223840291
		    [documentId] => 2309308035615666208
		    [message] => SUCCESS
		)*/
		
		//模板创建  有序
/*		$Receiver = new Receiver("PERSONAL");  
        $Receiver->set_name("徐*");
        $Receiver->set_mobile("17717088***");
        $Receiver->set_authLevel("BASIC");
        $Receiver2->set_ordinal(2);

        $Receiver2 = new Receiver("COMPANY");  
        $Receiver2->set_name("上海亘岩");
        $Receiver2->set_mobile("17717088***");
        $Receiver2->set_authLevel("BASIC");
        $Receiver2->set_ordinal(1);
		$arr =array();  
		array_push($arr, $Receiver);  
		array_push($arr, $Receiver2);  
		$json_string = json_encode($arr); 
		
		$templates = array(
			'name'=>'无名',
		    'mobile'=>'13487124785'
		);
		$post_data = array(
		    "subject" => "php-标准签-模板20170605",
		    "expireTime" => "2017-07-08",
			"templateId" => "2305581810964336993",
			"receivers" => $json_string,
		    "docName" => "标准签0605php",
			"templateParams" => json_encode($templates)
		);
		$result = $standardSignServiceImpl->createByTemplate($post_data);
		print_r($result);*/

		/*Array
		(
		    [code] => 0
		    [contractId] => 2309308040413950008
		    [documentId] => 2309308040036462645
		    [message] => SUCCESS
		)*/
		
		//-----------------------------------------------------------1.3用html创建合同
		//html创建合同   有序
/*		$Receiver = new Receiver("PERSONAL");  
        $Receiver->set_name("徐*");
        $Receiver->set_mobile("17717088***");
        $Receiver->set_authLevel("BASIC");
        $Receiver->set_ordinal(2);

        $Receiver2 = new Receiver("PLATFORM"); 
        $Receiver2->set_ordinal(1);
        //是否需要签署法人章；默认false
        //$Receiver2->set_legalPersonRequired(true);

        $arr =array();  
        array_push($arr, $Receiver);  
        array_push($arr, $Receiver2);  
        $json_string = json_encode($arr); 
        $post_data = array(
            "subject" => "x有序标准PHP-Html-Doc",
            "expireTime" => "2017-07-08",
            "receivers" => $json_string,
            "docName" => "标准htmlphplanguage",
            "html" => "<html><body><p>title</p><p>9999标准在线第三方电子合同平台。企业及个人用户可通过本平台与签约方快速完成合同签署，安全、合法、有效。</p></body></html>"
        );
        $result = $standardSignServiceImpl->createByHtml($post_data);
        print_r($result);*/
/*		Array
		(
		    [code] => 0
		    [contractId] => 2309309442469113976
		    [documentId] => 2309309442049683573
		    [message] => SUCCESS
		)*/
		
		//html创建合同     无序"receiveType" =>"SIMUL",
	/*	 $Receiver = new Receiver("PERSONAL");  
        $Receiver->set_name("徐*");
        $Receiver->set_mobile("17717088***");
        $Receiver->set_authLevel("BASIC");


        $Receiver2 = new Receiver("PLATFORM"); 
        //是否需要签署法人章；默认false
        //$Receiver2->set_legalPersonRequired(true);


        $arr =array();  
        array_push($arr, $Receiver);  
        array_push($arr, $Receiver2);  
        $json_string = json_encode($arr); 
        $post_data = array(
            "subject" => "无序标准PHP-Html-Doc",
            "expireTime" => "2017-07-08",
            "receivers" => $json_string,
            "receiveType" =>"SIMUL",
            "docName" => "标准htmlphplanguage",
            "html" => "<html><body><p>title</p><p>9999标准在线第三方电子合同平台。企业及个人用户可通过本平台与签约方快速完成合同签署，安全、合法、有效。</p></body></html>"
        );
        $result = $standardSignServiceImpl->createByHtml($post_data);
        print_r($result);*/
		/*Array
		(
		    [code] => 0
		    [contractId] => 2309309445623230607
		    [documentId] => 2309309445237354636
		    [message] => SUCCESS
		)*/
		
		
		//-----------------------------------------------------------2.1 运营方签署
		//2.1.1 ----------公章签署
		//非关键字
		/*$templates = array(
			'offsetX'=>0.5,
		    'offsetY'=>0.5,
			'page'=>1
		);
		$post_data = array(
		    "documentId" => "2308966670288994574",
		    "sealId" => "2307419306108956847",
			"location" => json_encode($templates)
		);
		$result =  $standardSignServiceImpl->sign($post_data);
		print_r($result);*/
		
		//关键字确定坐标
/*        $templates = array(
            'offsetX'=>0.01,
            'offsetY'=>0.01
        );
        $post_data = array(
            "documentId" => "2308966670288994574",
            "sealId" => "2307419306108956847",
            "keyword"=>"**",
            "location" => json_encode($templates)
        );
        $result =  $standardSignServiceImpl->sign($post_data);
        print_r($result);*/
		
		/*Array
		(
		    [message] => INVALID PARAM:documentId,2308966670288994574 is not turn to sign or has bean signed  
		    [code] => 1005
		)*/
		
		
		//2.1.2   ----------法人章签署
		//非关键字
//		$templates = array(
//			'offsetX'=>0.5,
//		    'offsetY'=>0.5,
//			'page'=>1
//		);
//		$post_data = array(
//		    "documentId" => "2313160230766015258",
//			"location" => json_encode($templates)
//		);
//		$result =  $standardSignServiceImpl->signbylegalperson($post_data);
//		print_r($result);
		
		//关键字
/*		$templates = array(
		    'offsetX'=>0.01,
		    'offsetY'=>0.05
		);
		$post_data = array(
		    "documentId" => "2313162578835521540",
		    "location" => json_encode($templates),
		    "keyword"=>"来到"
		);
		$result =  $standardSignServiceImpl->signbylegalperson($post_data);
		print_r($result);*/


		//-----------------------------------------------------------3.1 查询合同详情
		//$result =  $standardSignServiceImpl->detail('2308966670288994574');
		//print_r($result);
		/*
		 * Array
		(
		    [code] => 0
		    [contract] => Array
		        (
		            [id] => 2308966670943306001
		            [subject] => xs标准PHP-Html-Doc
		            [creatorName] => OpenApi
		            [publishTime] => 2017-06-04 20:49:13
		            [lastSignTime] => 2017-06-04 20:49:45
		            [expireTime] => 2017-07-08 00:00:00
		            [status] => WAITING
		            [signedCount] => 1
		            [documents] => Array
		                (
		                    [0] => Array
		                        (
		                            [id] => 2308966670288994574
		                            [title] => 标准htmlphplanguage
		                            [createTime] => 2017-06-04 20:49:13
		                        )
		
		                )
		
		            [signatories] => Array
		                (
		                    [0] => Array
		                        (
		                            [id] => 2308966672327426327
		                            [type] => COMPANY
		                            [tenantName] => 亘岩
		                            [contact] => 46578954521
		                            [ordinal] => 0
		                            [needOperator] => 
		                            [needLegalPerson] => 
		                            [needSeal] => 1
		                            [signed] => 1
		                            [sponsor] => 1
		                            [authLevel] => FULL
		                        )
		
		                    [1] => Array
		                        (
		                            [id] => 2308966672348397848
		                            [type] => PERSONAL
		                            [tenantName] => 徐嘟嘟
		                            [contact] => 17717088000
		                            [ordinal] => 1
		                            [needOperator] => 
		                            [needLegalPerson] => 
		                            [needSeal] => 
		                            [signed] => 
		                            [sponsor] => 
		                            [authLevel] => BASIC
		                        )
		
		                )
		
		            [categoryId] => 2305298796778721332
		            [categoryName] => 默认合同分类
		            [receiveType] => SEQ
		            [signMode] => MULTIPLE
		        )
		
		    [message] => SUCCESS
		)

		 * */
		
		//-----------------------------------------------------------4.1 下载合同清单
		//$result = $standardSignServiceImpl->download('2310716520939569757');
		//print_r($result);
		
		
		//-----------------------------------------------------------4.2 下载单个合同文件
		//$result = $standardSignServiceImpl->downloadDoc('2310716520939569757');
		
		//可以对下载的返回值测试一下
		//对文件名的编码，避免中文文件名乱码
		/*$path ='D:/ceshi.pdf';
		$destination = iconv("UTF-8", "GBK", $path); 
		$file = fopen($destination,"w+");
		$answer = fputs($file,$result);//写入文件
		fclose($file);*/
		
		//print_r($result);
		
		//-----------------------------------------------------------5.1 查询合同分类
		//$result =  $standardSignServiceImpl->queryCategory();
		//print_r($result);
		/*Array
		(
		    [code] => 0
		    [categories] => Array
		        (
		            [0] => Array
		                (
		                    [id] => 2305298796778721332
		                    [name] => 默认合同分类
		                    [authorize] => BASIC
		                    [type] => DEFAULT
		                )
		
		        )
		
		    [message] => SUCCESS
		)*/