<?php
header("Content-Type: text/html; charset=utf-8");

    function doService($url,HttpParameter $httpParameters, $headers, $connectTimeout, $readTimeout){
        switch ($httpParameters->getHttpMethod()) {
            case HttpMethod::GET:
                $result = doGet($url,$headers,$httpParameters->getParams(), $connectTimeout, $readTimeout);
                break;
            case HttpMethod::POST:
                $result = doPost($url,$headers,$httpParameters->getParams(), $connectTimeout, $readTimeout);
                break;
            default:
                $result = null;
                break;
        }
        return $result;
    }

    function doServiceWithJson($url, $json, $headers, $connectTimeout, $readTimeout){
        $flag=1;
        while($flag <= HttpConnection::RENNECT_TIMES) {
            try {
                if (!function_exists('curl_init')) {
                    throw new Exception("CURL扩展没有开启!");
                }
                $curl = curl_init();
                array_push($headers, 'Content-Type:application/json;charset=UTF-8');
                $curl = HttpConnection::buildHttpRequest($curl, $url, $headers);
                // 提交post请求
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                $output = curl_exec($curl);
                if ($output === false) {
                    $res = array(
                        "code" => 1001,
                        "message" => curl_error($curl)
                    );
                    $output = json_encode($res);
                }
                // 关闭CRUL
                curl_close($curl);
            } catch (Exception $exc) {
                // 关闭CRUL
                curl_close($curl);
                $res = array(
                    "code" => 1001,
                    "message" => $exc->getMessage()
                );
                $output = json_encode($res);
            }
            if($output){
                break;
            }
            $flag++;
        }
        return $output;
    }

    function doDownload($url,HttpParameter $httpParameters, $headers, $connectTimeout, $readTimeout, $filePath){
        $result = doGet($url,$headers,$httpParameters->getParams());
        //判断是否返回文件流
        $array_output = json_decode($result, true);
        if(is_array($array_output) && array_key_exists("code",$array_output) && $array_output['code']!==0){
            return array(
                "code" => $array_output['code'],
                "message" => $array_output['message']
            );
        }
        //对文件名的编码，避免中文文件名乱码
        $destination = iconv("UTF-8", "GBK", $filePath);
        $file = fopen($destination,"w+");
        $answer = fputs($file,$result);//写入文件
        fclose($file);
        if($answer===false){
            return array(
                "code" => 1001,
                "message" => '下载文件失败'
            );
        }else{
            return array(
                "code" => 0,
                "message" => '下载文件完成,字节数:'.$answer
            );
        }
    }

    /**
     * GET请求
     * @param $url
     * @param $heads
     * @param $data
     * @return mixed|string
     */
    function doGet($url, $heads, $data){
        $flag=1;
        while($flag <= HttpConnection::RENNECT_TIMES){
            try {
                // 请求参数有值时构建get请求
                if ($data) {
                    $url = HttpConnection::buildGetUrlParams($url, $data);
                }
                if (!function_exists('curl_init')) {
                    throw new Exception("CURL扩展没有开启!");
                }
                $curl = curl_init();
                $curl = HttpConnection::buildHttpRequest($curl, $url, $heads);
                $output = curl_exec($curl);
                if ($output === false) {
                    $res = array(
                        "code" => 1001,
                        "message" => curl_error($curl)
                    );
                    $output = json_encode($res);
                }
                curl_close($curl);
            } catch (Exception $exc) {
                curl_close($curl);
                $res = array(
                    "code" => 1001,
                    "message" => $exc->getMessage()
                );
                $output = json_encode($res);
            }
            if($output){
                break;
            }
            $flag++;
        }
        return $output;
    }

    /**
     * POST请求
     * @param $url
     * @param $heads
     * @param $data
     * @return mixed|string
     */
    function doPost($url, $heads, $data, $connectTimeout, $readTimeout){
        $flag=1;
        while($flag <= HttpConnection::RENNECT_TIMES) {
            try {
                if (!function_exists('curl_init')) {
                    throw new Exception("CURL扩展没有开启!");
                }
                $curl = curl_init();
                $curl = HttpConnection::buildHttpRequest($curl, $url, $heads);
                //启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。
                curl_setopt($curl, CURLOPT_POST, 1);
                // 提交post请求
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                $output = curl_exec($curl);
                if ($output === false) {
                    $res = array(
                        "code" => 1001,
                        "message" => curl_error($curl)
                    );
                    $output = json_encode($res);
                }
                // 关闭CRUL
                curl_close($curl);
            } catch (Exception $exc) {
                // 关闭CRUL
                curl_close($curl);
                $res = array(
                    "code" => 1001,
                    "message" => $exc->getMessage()
                );
                $output = json_encode($res);
            }
            if($output){
                break;
            }
            $flag++;
        }
        return $output;
    }
