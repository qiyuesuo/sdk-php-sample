<?php
	header("Content-Type: text/html; charset=utf-8");
	function createByLocal($standardSignServiceImpl){
	    /* 无序--本地PDF文件创建*/  
	    $Receiver = new Receiver("PERSONAL");  
        $Receiver->set_name("徐帅");
        $Receiver->set_mobile("17717088942");
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
        $contract->set_subject("我是亘岩007");
        $contract->set_expireTime("2019-09-08");
        $contract->set_docName("hsjsh哈哈哈");
        $contract->set_file($file);
        $contract->set_receiveType("SIMUL");//签署顺序；SEQ（顺序签署）、SIMUL（无序签署）；默认SEQ
        $contract->set_categoryId("2320051250809204968");//合同分类ID,分类在契约锁云平台进行维护
        
        $result = $standardSignServiceImpl->createByLocal($json_receivers,$contract);
        $documentId = $result['documentId'];
		return $documentId;
	}
	
	function createByTemplate($standardSignServiceImpl){
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
        
        $result = $standardSignServiceImpl->createByTemplate($json_receivers,$contract);
        $documentId = $result['documentId'];
		return $documentId;
	}
	
	function createByHtml($standardSignServiceImpl){
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
        $result = $standardSignServiceImpl->createByHtml($json_receivers,$contract);
        $documentId = $result['documentId'];
		return $documentId;
	}
	
	
	
	function sign($documentId,$standardSignServiceImpl){
		//--------------------------------------2.1.1公章签署
        //*********************非关键字
        $sealId = "2307419306108956847";//印章在契约锁的唯一标识
        $acrossPage = true;//是否签骑缝章，默认为false
		
		$stamper = new Stamper();
        $stamper->set_offsetX(0.01);
        $stamper->set_offsetY(0.01);
        $stamper->set_page(1);
        
		$result =  $standardSignServiceImpl->sign($documentId,$sealId,$stamper,$acrossPage);
		print_r("-----------------公章签署---------------------------------------------------------------------");
		print_r($result);
	}
	
	
	function signbylegalperson($documentId,$standardSignServiceImpl){
		//--------------------------------------2.1.2法人章签署
		//*******非关键字   法人章签署
		$stamper = new Stamper();
        $stamper->set_offsetX(0.4);
        $stamper->set_offsetY(0.4);
        $stamper->set_page(1);
		
		$result =  $standardSignServiceImpl->signbylegalperson($documentId,$stamper);
		print_r("-----------------法人章签署---------------------------------------------------------------------");
		print_r($result);
	}
	
	function detail($documentId,$standardSignServiceImpl){
		$result =  $standardSignServiceImpl->detail($documentId);
		print_r("-----------------查询合同详情---------------------------------------------------------------------");
		print_r($result);
	}
	
	
	function queryCategory($standardSignServiceImpl){
		$result =  $standardSignServiceImpl->queryCategory();
		print_r("-----------------查询合同分类 ---------------------------------------------------------------------");
		print_r($result);
	}