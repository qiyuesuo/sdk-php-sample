<?php

/**
 * 请求参数基本接口
 */

abstract class SdkRequest {

    /**
     * 请求路径
     * @return mixed
     */
    abstract function getUrl();

    /**
     * 创建请求参数
     * @return mixed
     */
    abstract function getHttpParamers();


}