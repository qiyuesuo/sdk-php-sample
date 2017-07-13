<?php
		header("Content-Type: text/html; charset=utf-8");
		/** 
		* 标准签接口测试
		* @author      xushuai
		*/  
		require_once(dirname(__FILE__).'/'.'../com.qiyuesuo.service.impl/StandardSignServiceImpl.php');
		require_once (dirname(__FILE__).'/'.'../com.qiyuesuo.common/Util.php');
		$url = Util::url;
		$accessKey = Util::accessKey;
		$accessSecret = Util::accessSecret;
		
		$SDk = new SDKClient($accessKey, $accessSecret, $url);
		$standardSignServiceImpl = new StandardSignServiceImpl($SDk);
		
		
		
		/*
		 *---------------------------------------------------------------
		 * 1.1 用本地PDF文件创建
		 *---------------------------------------------------------------
		 */
		
		/* 无序--本地PDF文件创建*/  
		
		$Receiver = new Receiver("PERSONAL");  
        $Receiver->set_name("徐嘟嘟");
        $Receiver->set_mobile("17717088943");
        $Receiver->set_authLevel("BASIC");

        $Receiver2 = new Receiver("PLATFORM"); 
        $Receiver2->set_legalPersonRequired(true);//是否需要签署法人章；默认false
        $arr = array();  
        array_push($arr, $Receiver);  
        array_push($arr, $Receiver2);  
        $json_receivers = json_encode($arr); 
        
        
        $file_path = "D:/demo2.pdf";
        $file = new \CURLFile(realpath($file_path));
        
        $contract = new Contract();
        $contract->set_subject("我是亘岩");
        $contract->set_expireTime("2017-09-08");
        $contract->set_docName("hsjsh哈哈哈");
        $contract->set_file($file);
        $contract->set_receiveType("SIMUL");//签署顺序；SEQ（顺序签署）、SIMUL（无序签署）；默认SEQ
        $contract->set_categoryId("2320051250809204968");//合同分类ID,分类在契约锁云平台进行维护
        
        //$result = $standardSignServiceImpl->createByLocal($json_receivers,$contract);
        //print_r($result);
        
        
		/*
		 * 返回：
		 * 
		 *Array
(
    [code] => 0
    [documentId] => 2320052073295442157
    [message] => SUCCESS
)*/
        
        
        
		
		/* (有序)--本地PDF文件创建*/  
		//创建合同接收人信息
 		$Receiver = new Receiver("PERSONAL");  
        $Receiver->set_name("徐嘟嘟");
        $Receiver->set_mobile("17717088941");
        $Receiver->set_authLevel("BASIC");
        $Receiver->set_ordinal(1);
        
        $Receiver3 = new Receiver("PERSONAL");  
        $Receiver3->set_name("徐sa");
        $Receiver3->set_mobile("17717088943");
        $Receiver3->set_authLevel("BASIC");
        $Receiver3->set_ordinal(3);

        $Receiver2 = new Receiver("PLATFORM"); 
        $Receiver2->set_ordinal(2);
        $Receiver2->set_legalPersonRequired(true);//是否需要签署法人章；默认false
        
        $arr = array();  
        
        array_push($arr, $Receiver);  
        array_push($arr, $Receiver2);
        array_push($arr, $Receiver3);  
          
        $json_receivers = json_encode($arr); 
        
        $file_path = "D:/demo.pdf";
        $file = new \CURLFile(realpath($file_path));
        
        $contract = new Contract();
        $contract->set_subject("我是亘岩的传人");
        $contract->set_expireTime("2017-09-08");
        $contract->set_docName("hsjsh哈哈哈");
        $contract->set_file($file);
        //$contract->set_categoryId("***");//合同分类ID,分类在契约锁云平台进行维护

        //$result =  $standardSignServiceImpl->createByLocal($json_receivers,$contract);
        //print_r($result);
        
        
		/*返回：
		 * Array
		(
		    [code] => 0
		    [documentId] => 2310276952156750125
		    [message] => SUCCESS
		 )*/
		
		/*
		 *---------------------------------------------------------------
		 * 1.2 用模板创建
		 *---------------------------------------------------------------
		 */
		
		//-------模板创建  无序
		$Receiver = new Receiver("PERSONAL");  
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
        $json_receivers = json_encode($arr); 
        

        $templates = array(
            'name'=>'帅哥0000',
            'mobile'=>'134871247850000'
        );
        
        $contract = new Contract();
        $contract->set_subject("我是亘岩的传人");
        $contract->set_expireTime("2017-07-08");
        $contract->set_docName("hsjsh哈哈哈");
        $contract->set_templateId("2305581810964336993");
        $contract->set_receiveType("SIMUL");//签署顺序；SEQ（顺序 签署）、SIMUL（无序 签署 ）；默认SEQ
        $contract->set_templateParams(json_encode($templates));//合同模板参数；键值对形式字符串
        //$contract->set_categoryId("***");//合同分类ID,分类在契约锁云平台进行维护
        
        //$result = $standardSignServiceImpl->createByTemplate($json_receivers,$contract);
        //print_r($result);
		/*返回：
		 * Array
		(
		    [code] => 0
		    [contractId] => 2309308036223840291
		    [documentId] => 2309308035615666208
		    [message] => SUCCESS
		)*/
		
		//-----------------------------模板创建  有序
		$Receiver = new Receiver("PERSONAL");  
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
		$json_receivers = json_encode($arr); 
		
		$templates = array(
            'name'=>'帅哥0000',
            'mobile'=>'134871247850000'
        );
        
        $contract = new Contract();
        $contract->set_subject("我是亘岩的传人");//合同主题
        $contract->set_expireTime("2017-07-08");
        $contract->set_docName("hsjsh哈哈哈");//合同文件名称
        $contract->set_templateId("2305581810964336993");
        $contract->set_templateParams(json_encode($templates));//合同模板参数；键值对形式字符串
        //$contract->set_categoryId("***");//合同分类ID,分类在契约锁云平台进行维护
		//$result = $standardSignServiceImpl->createByTemplate($json_receivers,$contract);
		//print_r($result);
		
		
		/*
		 *---------------------------------------------------------------
		 * 1.3用html创建合同
		 *---------------------------------------------------------------
		 */
		//-------------------html创建合同   有序
		$Receiver = new Receiver("PERSONAL");  
        $Receiver->set_name("徐*");
        $Receiver->set_mobile("17717088***");
        $Receiver->set_authLevel("BASIC");
        $Receiver->set_ordinal(2);

        $Receiver2 = new Receiver("PLATFORM"); //运营平台
        $Receiver2->set_ordinal(1);
        //是否需要签署法人章；默认false
        //$Receiver2->set_legalPersonRequired(true);

        $arr =array();  
        array_push($arr, $Receiver);  
        array_push($arr, $Receiver2);  
        $json_receivers = json_encode($arr); 
        
        $contract = new Contract();
        $contract->set_subject("我是亘岩的传人");//合同主题
        $contract->set_expireTime("2017-07-08");
        $contract->set_docName("hsjsh哈哈哈");//合同文件名称
        $contract->set_html("<html><body><p>title</p><p>9999标准在线第三方电子合同平台。企业及个人用户可通过本平台与签约方快速完成合同签署，安全、合法、有效。</p></body></html>");
        //$contract->set_categoryId("***");//合同分类ID,分类在契约锁云平台进行维护

        //$result = $standardSignServiceImpl->createByHtml($json_receivers,$contract);
        //print_r($result);
		/*
		 * 返回：Array
		(
		    [code] => 0
		    [contractId] => 2309309442469113976
		    [documentId] => 2309309442049683573
		    [message] => SUCCESS
		)*/
		
		//-------------------html创建合同 无序
		$Receiver = new Receiver("PERSONAL");  
        $Receiver->set_name("徐9");
        $Receiver->set_mobile("1771708999");
        $Receiver->set_authLevel("BASIC");


        $Receiver2 = new Receiver("PLATFORM"); 
        //是否需要签署法人章；默认false
        //$Receiver2->set_legalPersonRequired(true);


        $arr =array();  
        array_push($arr, $Receiver);  
        array_push($arr, $Receiver2);  
        $json_receivers = json_encode($arr); 
        
        $contract = new Contract();
        $contract->set_subject("我是亘岩的传人");//合同主题
        $contract->set_expireTime("2017-07-08");
        $contract->set_docName("hsjsh哈哈哈");//合同文件名称
        $contract->set_receiveType("SIMUL");//签署顺序；SEQ（顺序 签署）、SIMUL（无序 签署 ）；默认SEQ
        $contract->set_html("<html><body><p>title</p><p>9999标准在线第三方电子合同平台。企业及个人用户可通过本平台与签约方快速完成合同签署，安全、合法、有效。</p></body></html>");
        //$contract->set_categoryId("***");//合同分类ID,分类在契约锁云平台进行维护
        //$result = $standardSignServiceImpl->createByHtml($json_receivers,$contract);
        //print_r($result);
        
		
		
		/*
		 *---------------------------------------------------------------
		 * 2.1 运营方签署
		 *---------------------------------------------------------------
		 */
		//--------------------------------------2.1.1公章签署
		
        
        //*********************非关键字
		$documentId = "2320405076858827676";
        $sealId = "2307419306108956847";//印章在契约锁的唯一标识
        $acrossPage = true;//是否签骑缝章，默认为false
		
		$stamper = new Stamper();
        $stamper->set_offsetX(0.01);
        $stamper->set_offsetY(0.01);
        $stamper->set_page(1);
        
		//$result =  $standardSignServiceImpl->sign($documentId,$sealId,$stamper,$acrossPage);
		//print_r($result);
		
		
		//*********************关键字确定坐标
        $documentId = "2320405076858827676";
        $sealId = "2307419306108956847";//印章在契约锁的唯一标识
        
        $stamper = new Stamper();
        $stamper->set_offsetX(0.01);
        $stamper->set_offsetY(0.01);
		$stamper->set_keyword("市");//关键字；用来确定印章的坐标位置
		$stamper->set_keywordIndex(1);//关键字索引，默认为1；取值范围：1到无穷大/-1到无穷小 ；1代表第一个；-1代表最后一个
        
        //$result =  $standardSignServiceImpl->sign($documentId,$sealId,$stamper);
        //print_r($result);

		
		
		
		//--------------------------------------2.1.2法人章签署
		//*******非关键字   法人章签署
		$documentId = "2320405076858827676";
		
		$stamper = new Stamper();
        $stamper->set_offsetX(0.4);
        $stamper->set_offsetY(0.4);
        $stamper->set_page(1);
		
		//$result =  $standardSignServiceImpl->signbylegalperson($documentId,$stamper);
		//print_r($result);
		
		//*******关键字  法人章签署
		$documentId = "2318011914124759353";
		
		$stamper = new Stamper();
        $stamper->set_offsetX(0.01);
        $stamper->set_offsetY(0.01);
        $stamper->set_keyword("来到");
		//$result =  $standardSignServiceImpl->signbylegalperson($documentId,$stamper);
		//print_r($result);

		
		
		/*
		 *---------------------------------------------------------------
		 * 3.1 查询合同详情
		 *---------------------------------------------------------------
		 */
		$result =  $standardSignServiceImpl->detail('2321921806957473973');
		print_r($result);
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
		
		
		
		
		/*
		 *---------------------------------------------------------------
		 * 4.1 下载合同清单
		 *---------------------------------------------------------------
		 */
		//$result = $standardSignServiceImpl->download('2310716520939569757');
		//print_r($result);
		
		
		
		/*
		 *---------------------------------------------------------------
		 * 4.2 下载单个合同文件
		 *---------------------------------------------------------------
		 */
		//$result = $standardSignServiceImpl->downloadDoc('2310716520939569757');
		
		//可以对下载的返回值测试一下
		//对文件名的编码，避免中文文件名乱码
		/*$path ='D:/ceshi.pdf';
		$destination = iconv("UTF-8", "GBK", $path); 
		$file = fopen($destination,"w+");
		$answer = fputs($file,$result);//写入文件
		fclose($file);*/
		
		//print_r($result);
		
		
		
		/*
		 *---------------------------------------------------------------
		 * 5.1 查询合同分类
		 *---------------------------------------------------------------
		 */
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
