<?php

class HttpHeader{

    private $accessToken;
    private $timestamp;
    private $signature;
    private $version;

    /**
     * HttpHeader constructor.
     * @param $timestamp
     * @param $accessToken
     * @param $signature
     * @param $version
     */
    public function __construct($accessToken, $timestamp, $signature, $version) {
        $this->accessToken = $accessToken;
        $this->timestamp = $timestamp;
        $this->signature = $signature;
        $this->version = $version;
    }

    public function getArray(){
        $headers = array(
            'x-qys-open-accesstoken:'.$this->accessToken,
            'x-qys-open-signature:'.$this->signature,
            'x-qys-open-timestamp:'.$this->timestamp,
            'User-Agent:'.'qiyuesuo-php-sdk',
            'version:'.SDKClient::SDK_VERSION
        );
        return $headers;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param mixed $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

}