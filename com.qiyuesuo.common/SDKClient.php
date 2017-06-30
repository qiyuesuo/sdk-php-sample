<?php
require_once("Helper.php");
class SDKClient{
	private $accessKey;
	private $accessSecret;
	private $serverUrl; 
	
	public  function __get($property_name) 
	{ 
		if(isset($this->$property_name)) { 
			return($this->$property_name); 
		}else 
		{ 
			return(NULL); 
		} 
	} 
	
	function __construct($accessKey,$accessSecret,$serverUrl){  
		$this->accessKey = $accessKey;  
		$this->accessSecret = $accessSecret;
		$this->serverUrl = $serverUrl;
    } 
    
	public function service($serviceUrl,$paramers) {
		$url = $this->serverUrl.$serviceUrl;
		$time = get_millistime();
		$signature = md5($this->accessKey.$this->accessSecret.$time);
		$headers = array(
		   'x-qys-open-accesstoken:'.$this->accessKey,
		   'x-qys-open-signature:'.$signature,
		   'x-qys-open-timestamp:'.$time
		);
		$result = getHttps($url,$headers,$paramers);
		if(strpos($serviceUrl, 'download') === false){
			$result = json_decode($result, true);
			if(!$result){
				$result = array(
					'code'=>1001,
				    'message'=>'请求失败!'
				);
			}
			foreach ($result as $key=>$value){
			     if ($key === "contractId"){
			     	unset($result[$key]);
			     	break;
			     }
			         
			}
		}
		return $result;
    }
    
}