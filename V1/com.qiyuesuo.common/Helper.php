<?php
header("Content-Type: text/html; charset=utf-8");
	/** 
	* getHttps
	* 函数的含义说明 
	* 
	* @access public 
	* @param $url 必填 API地址
	* @param $heads 发送头信息 为空
	* @param $data post方式下需要,需要urldecode
	* @version     1.0 
	* @return array 
	*/  
	 function getHttps($url, $heads,$data = null) {
        try {
            if (function_exists('curl_init')) {
            	$ssl = substr($url, 0, 8) == "https://" ? TRUE : FALSE;
                $curl = curl_init();
           		if ($ssl)
			    {
			        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
					curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
			    }
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_TIMEOUT,35);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,15);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($curl, CURLOPT_HTTPHEADER,  $heads);
                if ($data) {
                    curl_setopt($curl, CURLOPT_POST, 1);//启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);//全部数据使用HTTP协议中的"POST"操作来发送。
                }
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//设定是否显示头信息
                $output = curl_exec($curl);
                if ($output === false) {
                    $res = array(
                        "code" => 1001,
                        "message" => curl_error($curl)
                    );
                    $output = json_encode($res);
                }
                curl_close($curl);
            } else {
                $res = array(
                    "code" => 1001,
                    "message" => "CURL扩展没有开启!"
                );
                $output = json_encode($res);
            }
        } catch (Exception $exc) {
            $res = array(
                "code" => 1001,
                "message" => $exc->getTraceAsString()
            );
            $output = json_encode($res);
        }
        return $output;
    }
    
  
    function get_millistime(){
	    $microtime = microtime();
	    $comps = explode(' ', $microtime);
	    return sprintf('%d%03d', $comps[1], $comps[0] * 1000);
	}
	
	/** 
	* some_func  
	* 远程签参数校验
	* 
	* @access public 
	* @param array $post_data 
	* @param string $type 
	* @return array 
	*/  
	function checkRemoteSignurl($post_data,$type){
		if(!array_key_exists("documentId",$post_data)){
			return  array(
				'code'=>1005,
			    'message'=>'未指定合同文件的唯一标识'
			);
		}
		if(!array_key_exists("operation",$post_data)){
			return  array(
				'code'=>1005,
			    'message'=>'未指定操作类型'
			);
		}
		if(!array_key_exists("signer",$post_data)){
			return  array(
				'code'=>1005,
			    'message'=>'未指定签署人'
			);
		}else{
			$array_signer = json_decode($post_data['signer'], true);
			if($post_data['operation']==='SIGNWITHPIN'){
				if(!array_key_exists("mobile",$array_signer)){
					return  array(
						'code'=>1005,
					    'message'=>'未指定个人手机号（联系人手机号）'
					);
				}
			}
			if(!array_key_exists("successUrl",$post_data)){
				return  array(
					'code'=>1005,
				    'message'=>'未指定签署成功后跳转的url'
				);
			}
		}
		if(!array_key_exists("successUrl",$post_data)){
			return  array(
				'code'=>1005,
			    'message'=>'未指定签署成功后跳转的url'
			);
		}
		
		return  array('code'=>0);
	}
	
	function checkRemote($post_data,$type){
		if($type==='createByLocal'){
			if(!array_key_exists("subject",$post_data)){
				return  array(
					'code'=>1005,
				    'message'=>'未指定合同名称'
				);
			}
			if(!array_key_exists("file",$post_data)){
				return  array(
					'code'=>1005,
				    'message'=>'未指定合同文件'
				);
			}
		}
		
		if($type==='createbytemplate'){
			if(!array_key_exists("subject",$post_data)){
				return  array(
					'code'=>1005,
				    'message'=>'未指定合同名称'
				);
			}
			if(!array_key_exists("templateId",$post_data)){
				return  array(
					'code'=>1005,
				    'message'=>'未指定合同模板ID'
				);
			}
		}
		
		if($type==='createbyhtml'){
			if(!array_key_exists("subject",$post_data)){
				return  array(
					'code'=>1005,
				    'message'=>'未指定合同名称'
				);
			}
			if(!array_key_exists("html",$post_data)){
				return  array(
					'code'=>1005,
				    'message'=>'未指定html格式的合同'
				);
			}
		}
		
		
		if($type==='signbyplatform'||$type==='signbycompany'||$type==='signbyperson'){
			if(!array_key_exists("documentId",$post_data)){
				return  array(
					'code'=>1005,
				    'message'=>'未指定合同文件在契约锁的唯一标识'
				);
			}
			
			if($type==='signbycompany'){
				if(!array_key_exists("company",$post_data)){
					return  array(
						'code'=>1005,
					    'message'=>'未指定企业用户信息'
					);
				}else{
					$array_company = json_decode($post_data['company'], true);
					if(!array_key_exists("name",$array_company)){
						return  array(
							'code'=>1005,
						    'message'=>'未指定企业名称'
						);
					}
					if(!array_key_exists("registerNo",$array_company)&&!array_key_exists("email",$array_company)&&!array_key_exists("telephone",$array_company)){
						return  array(
							'code'=>1005,
						    'message'=>'registerNo，email，telephone三选一,不能都为空'
						);
					}
				}
			}
			
			if($type==='signbyperson'){
				if(!array_key_exists("person",$post_data)){
					return  array(
						'code'=>1005,
					    'message'=>'未指定个人用户信息'
					);
				}else{
					$array_person = json_decode($post_data['person'], true);
					if(!array_key_exists("name",$array_person)){
						return  array(
							'code'=>1005,
						    'message'=>'未指定用户姓名'
						);
					}
					if(!array_key_exists("idcard",$array_person)&&!array_key_exists("email",$array_person)&&!array_key_exists("mobile",$array_person)){
						return  array(
							'code'=>1005,
						    'message'=>'registerNo，email，telephone三选一,不能都为空'
						);
					}
				}
			}
		}
		return  array('code'=>0);
	}
	
	function check($post_data,$type){
		if(!array_key_exists("docName",$post_data)){
			return  array(
				'code'=>1005,
			    'message'=>'未指定合同文件名称'
			);
		}
		if($type==='createByLocal'&&!array_key_exists("file",$post_data)){
			return  array(
				'code'=>1005,
			    'message'=>'未指定合同文件'
			);
		}
		if($type==='createByTemplate'&&!array_key_exists("templateId",$post_data)){
			return  array(
				'code'=>1005,
			    'message'=>'未指定合同模板ID'
			);
		}
		if($type==='createByHtml'&&!array_key_exists("html",$post_data)){
			return  array(
				'code'=>1005,
			    'message'=>'未指定html文本'
			);
		}
		
		if(!array_key_exists("receivers",$post_data)){
			return  array(
				'code'=>1005,
			    'message'=>'未指定合同接收方'
			);
		}
		
		$receiver_array = json_decode($post_data['receivers'], true);
		foreach ($receiver_array as $r){
			if(($r['type']!=='PERSONAL'&&$r['type']!=='COMPANY'&&$r['type']!=='PLATFORM')){
				return  array(
				'code'=>1005,
			    'message'=>'未指定接收人类型或者接收人类型错误'
				);
			}
			if($r['type']==='PERSONAL'||$r['type']==='COMPANY'){
				if(!$r['type']||!$r['name']||!$r['mobile']||!$r['authLevel']){
					return  array(
					'code'=>1005,
				    'message'=>'接收方是个人（或公司）时，type,name,mobile,authLevel必填。'
					);
				}
			}
			
			if((array_key_exists("receiveType",$post_data)&&$post_data['receiveType']==='SEQ')||!array_key_exists("receiveType",$post_data)){
				if(!is_int($r['ordinal'])){
					return  array(
						'code'=>1005,
					    'message'=>'签署顺序是顺序签署时，ordinal不能为空，且Number类型'
					);
				}
				
			}
		}
		
		return  array('code'=>0);
	}
	
	function checkDown($documentId){
		if(!is_string($documentId)||!$documentId){
			$result = array(
				'code'=>1005,
			    'message'=>'合同文档ID参数出错'
			);
			return $result;
		}
		/*if(!$path){
			$result = array(
				'code'=>1005,
			    'message'=>'未指定下载保存路径'
			);
			return $result;
		}*/
		return  array('code'=>0);
	}
	
	
	function checkSign($post_data,$type){
		if($type==='signStand'){
			if(!array_key_exists("documentId",$post_data)){
				return  array(
					'code'=>1005,
				    'message'=>'未指定合同文件ID'
				);
			}
			if(!array_key_exists("sealId",$post_data)){
				return  array(
					'code'=>1005,
				    'message'=>'未指定印章ID'
				);
			}
			
			if(array_key_exists("location",$post_data)){
				$array_offset = json_decode($post_data['location'], true);
				if(!array_key_exists("offsetX",$array_offset)){
					return  array(
						'code'=>1005,
					    'message'=>'未指定印章横坐标'
					);
				}
				if(!array_key_exists("offsetY",$array_offset)){
					return  array(
						'code'=>1005,
					    'message'=>'未指定印章纵坐标'
					);
				}
			}
		}
		
		if($type==='lpSignStand'){
			if(!array_key_exists("documentId",$post_data)){
				return  array(
					'code'=>1005,
				    'message'=>'未指定合同文件ID'
				);
			}
			
			if(array_key_exists("location",$post_data)){
				$array_offset = json_decode($post_data['location'], true);
				if(!array_key_exists("offsetX",$array_offset)){
					return  array(
						'code'=>1005,
					    'message'=>'未指定印章横坐标'
					);
				}
				if(!array_key_exists("offsetY",$array_offset)){
					return  array(
						'code'=>1005,
					    'message'=>'未指定印章纵坐标'
					);
				}
			}
		}
		
		
		return  array('code'=>0);
	}
	
	//根据返回的二进制数据（如图像）和字符数据  写到$path路径
	function checkDownloadAndReturn($output,$path){
		//判断是否返回文件流
		$array_output = json_decode($output, true);
		if(is_array($array_output)&&array_key_exists("code",$array_output)&&$array_output['code']!==0){
			return array(
                "code" => 1001,
                "message" => '下载文件失败,'.$array_output['message']
            );
		}
		//对文件名的编码，避免中文文件名乱码
		$destination = iconv("UTF-8", "GBK", $path); 
		$file = fopen($destination,"w+");
		$answer = fputs($file,$output);//写入文件
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

	
