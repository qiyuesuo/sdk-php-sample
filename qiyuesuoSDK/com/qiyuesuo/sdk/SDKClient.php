<?php
header("Content-Type: text/html; charset=utf-8");

/**
 *
 * 契约锁SDK客户端封装类
 *
 */
class SDKClient{

    const SDK_VERSION = 'PHP-1.5.0';    // php版本

	private $accessKey;                 // appToken
	private $accessSecret;              // appSecret
	private $serverUrl;                 // 契约锁服务地址

    const connectTimeout = 15;
    const readTimeout = 30;

	public function __get($property_name) {
		if (isset($this->$property_name)) {
			return($this->$property_name); 
		} else {
			return(NULL); 
		} 
	} 
	
	public function __construct($accessKey,$accessSecret,$serverUrl) {
		$this->accessKey = $accessKey;  
		$this->accessSecret = $accessSecret;
		$this->serverUrl = $serverUrl;
    }

    /**
     * 普通接口服务
     * @param SdkRequest $baseRequest
     * @return mixed|null|string
     */
    public function service(SdkRequest $baseRequest) {

        $url = $this->serverUrl.$baseRequest->getUrl();
        $time = $this->get_millistime();
        $signature = md5(str_replace(' ', '',$this->accessKey.$this->accessSecret.$time));

        $httpHeader = new HttpHeader($this->accessKey, $time, $signature, self::SDK_VERSION);
        $httpHeader = $httpHeader->getArray();
        $httpParamers = $baseRequest->getHttpParamers();
        if($httpParamers->isJson()){
            $result = doServiceWithJson($url, $httpParamers->getJsonParams(), $httpHeader, self::connectTimeout, self::readTimeout);
        } else {
            $result = doService($url, $httpParamers, $httpHeader, self::connectTimeout, self::readTimeout);
        }
        if(strpos($url, 'download') === false ){
            $result = json_decode($result, true);
        }
        return $result;

    }

    /**
     * 下载接口服务
     * @param SdkRequest $baseRequest
     * @param $filePath
     * @return mixed|null|string
     */
    public function downloadService(SdkRequest $baseRequest, $filePath) {
        $url = $this->serverUrl.$baseRequest->getUrl();
        $time = $this->get_millistime();
        $signature = md5(str_replace(' ', '',$this->accessKey.$this->accessSecret.$time));

        $httpHeader = new HttpHeader($this->accessKey, $time, $signature, self::SDK_VERSION);
        $httpHeader = $httpHeader->getArray();
        $httpParamers = $baseRequest->getHttpParamers();
        return doDownload($url, $httpParamers, $httpHeader, self::connectTimeout, self::readTimeout, $filePath);
    }

    /**
     * 获取当前时间戳
     * @return string
     */
    private function get_millistime(){
        $microtime = microtime();
        $comps = explode(' ', $microtime);
        return sprintf('%d%03d', $comps[1], $comps[0] * 1000);
    }
}