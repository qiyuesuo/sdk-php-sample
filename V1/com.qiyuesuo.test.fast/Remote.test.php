<?php
		header("Content-Type: text/html; charset=utf-8");
		/**   
		* 远程签接口   快速    测试
		*/  
		require_once(dirname(__FILE__).'/'.'../com.qiyuesuo.service.impl/RemoteSignServiceImpl.php');
		require_once(dirname(__FILE__).'/'.'../com.qiyuesuo.common/Util.php');
		require_once(dirname(__FILE__).'/'.'../com.qiyuesuo.test.fast/Remote.func.php');
		
		$remoteSignServiceImpl = new RemoteSignServiceImpl(Util::getSDk());
		
		$documentId = createByLocal($remoteSignServiceImpl);
		
		//$documentId = createByTemplate($remoteSignServiceImpl);
		
		//$documentId = createByHtml($remoteSignServiceImpl);
		
		signByPlatform($documentId,$remoteSignServiceImpl);
		
		signBycompany($documentId,$remoteSignServiceImpl);
		
		signByPerson($documentId,$remoteSignServiceImpl);
		
		
		detail($documentId,$remoteSignServiceImpl);
		
		signUrlPerson($documentId,$remoteSignServiceImpl);
		
		signUrlCompany($documentId,$remoteSignServiceImpl);
		
		//complete($documentId,$remoteSignServiceImpl);
		
		//viewUrl($documentId,$remoteSignServiceImpl);