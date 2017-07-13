<?php
		header("Content-Type: text/html; charset=utf-8");
		/**   
		* 远程签接口   快速    测试
		*/  
		require_once(dirname(__FILE__).'/'.'../com.qiyuesuo.service.impl/RemoteSignServiceImpl.php');
		require_once(dirname(__FILE__).'/'.'../com.qiyuesuo.common/Util.php');
		require_once(dirname(__FILE__).'/'.'../com.qiyuesuo.test.fast/Remote.func.php');
		
		$url = Util::url;
		$accessKey = Util::accessKey;
		$accessSecret = Util::accessSecret;
		
		$SDk = new SDKClient($accessKey, $accessSecret, $url);
		$remoteSignServiceImpl = new RemoteSignServiceImpl($SDk);
		
		
		
		//$documentId = createByLocal($remoteSignServiceImpl);
		
		$documentId = createByTemplate($remoteSignServiceImpl);
		
		//$documentId = createByHtml($remoteSignServiceImpl);
		
		signByPlatform($documentId,$remoteSignServiceImpl);
		
		signBycompany($documentId,$remoteSignServiceImpl);
		
		signByPerson($documentId,$remoteSignServiceImpl);
		
		complete($documentId,$remoteSignServiceImpl);
		
		detail($documentId,$remoteSignServiceImpl);
		
		signUrlPerson($documentId,$remoteSignServiceImpl);
		
		viewUrl($documentId,$remoteSignServiceImpl);