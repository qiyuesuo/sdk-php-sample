<?php
header("Content-Type: text/html; charset=utf-8");
/** 
*这是一个定义常量的文件 
*查看您申请的Access Token和Access Secret
*accessKey：Access Token
*accessSecret：Access Secret
*
*https://openapi.qiyuesuo.me 表示的是测试环境
*https://openapi.qiyuesuo.com 表示的是生产环境
* @version     1.0.1 
*/
require_once(dirname(__FILE__).'/'."Contract.php");
require_once(dirname(__FILE__).'/'."Company.php");
require_once(dirname(__FILE__).'/'."Person.php");
require_once(dirname(__FILE__).'/'."Receiver.php");
require_once(dirname(__FILE__).'/'."Stamper.php");
require_once(dirname(__FILE__).'/'."Helper.php");
require_once(dirname(__FILE__).'/'."SDKClient.php");
class Util {
    const   url = "https://openapi.qiyuesuo.me";
    const 	accessKey = "0VPomO22**";
    const 	accessSecret = "nOcih5AtxnD6vCmYLWi42iz2VJM0**";
    public static  function getSDk(){
		$url = self::url;
		$accessKey = self::accessKey;
		$accessSecret = self::accessSecret;
		$SDk = new SDKClient($accessKey, $accessSecret, $url);
		return $SDk;
	}

}