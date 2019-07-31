<?php
		header("Content-Type: text/html; charset=utf-8");
		/** 
		* 标准签接口   快速    测试
		*/  
		require_once(dirname(__FILE__).'/'.'../com.qiyuesuo.service.impl/StandardSignServiceImpl.php');
		require_once (dirname(__FILE__).'/'.'../com.qiyuesuo.common/Util.php');
		require_once(dirname(__FILE__).'/'.'../com.qiyuesuo.test.fast/Standard.func.php');
		
		$standardSignServiceImpl = new StandardSignServiceImpl(Util::getSDk());
		
		
		$documentId = createByLocal($standardSignServiceImpl);//无序  本地PDF文件创建合同
		
		signbylegalperson($documentId,$standardSignServiceImpl);//法人章签署
		
		sign($documentId,$standardSignServiceImpl);//公章签署
		
		detail($documentId,$standardSignServiceImpl);//查询合同详情
		
		queryCategory($standardSignServiceImpl);//查询合同分类