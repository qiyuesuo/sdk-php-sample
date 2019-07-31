<?php

class HttpConnection {

    const SSL_CHECK = false;         // 忽略SSL检查

    const RENNECT_TIMES = 2;        // 连接重试次数

    /**
     *
     * 构建http请求参数
     *
     */
    public static function buildHttpRequest($curl, $url, $heads){
        curl_setopt($curl, CURLOPT_TIMEOUT, SDKClient::readTimeout);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, SDKClient::connectTimeout);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, self::SSL_CHECK);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, self::SSL_CHECK);
        //设定是否显示头信息
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_URL, $url);
//        array_push($heads, 'User-Agent:'.'qiyuesuo-php-sdk');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $heads);
        return $curl;
    }

    /**
     *
     * 数组转字符串，拼接GET请求参数
     *
     */
    public static function buildGetUrlParams($url, $data){
        $url = $url.'?';
        $string = [];
        if($data && is_array($data)){
            foreach ($data as $key=> $value){
                $string[] = $key.'='.$value;
            }
        }
        return $url.implode('&',$string);
    }
}