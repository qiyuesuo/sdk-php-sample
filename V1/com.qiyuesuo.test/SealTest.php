<?php
		header("Content-Type: text/html; charset=utf-8");
		/** 
		* 印章接口测试
		* @author      xushuai
		*/  
		header("Content-type: text/html; charset=utf-8"); 
		require_once(dirname(__FILE__).'/'.'../com.qiyuesuo.service.impl/SealServiceImpl.php');
		require_once (dirname(__FILE__).'/'.'../com.qiyuesuo.common/Util.php');
		
		$sealServiceImpl = new SealServiceImpl(Util::getSDk());
		/*
		 *---------------------------------------------------------------
		 * 1 获取平台印章
		 *---------------------------------------------------------------
		 */
		/*$a1 = get_millistime();
		$result =  $sealServiceImpl->findSeal('2307419306108956847');
		$a2 = get_millistime();
		echo $result['code'].'***'.$result['message']."***耗时(ms)=".($a2-$a1);
		print_r($result);*/
		
		
		
		
		/*
		 *---------------------------------------------------------------
		 * 2.生成企业电子印章
		 *---------------------------------------------------------------
		 */
		//$result  = $sealServiceImpl->generateSeal('石油公司');
		//print_r($result);
		
		/*		Array
		(
		    [code] => 0
		    [seal] => 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
		    [message] => SUCCESS
		)*/
		/*		Array
		(
		    [code] => 1005
		    [message] => 无效的请求参数:99
		)*/
		
		
		
		
		/*
		 *---------------------------------------------------------------
		 * 3.生成个人电子印章
		 *---------------------------------------------------------------
		 */
	    //print_r($sealServiceImpl->generatePersonalSeal('丁武'));
	    
		
		
		
		/*
		 *---------------------------------------------------------------
		 * 4.获取所有可用的平台印章
		 *---------------------------------------------------------------
		 */
		print_r($sealServiceImpl->sealList());
		/*		Array
		(
		    [code] => 0
		    [message] => SUCCESS
		    [list] => Array
		        (
		            [0] => Array
		                (
		                    [id] => 2307419306108956847
		                    [sealName] => 石油公司
		                    [createTime] => 2017-05-31 14:20:32
		                )
		
		        )
		
		)*/