<?php
header("Content-Type: text/html; charset=utf-8");

    /**
     * 创建合同草稿
     */
    function testDraftContract(SDKClient $sdkClient){
        /** 合同基本信息 */
        $contract = new Contract();
//        $contract->setBizId("111222333");
        $contract->setSubject("V2合同");
        $contract->setDescription("合同描述");
        $contract->setSn("123321");
        $contract->setExpireTime("2019-08-25 00:00:00");
        $contract->setOrdinal(true);
        $contract->setSend(false);

        $category = new Category();
        $category->setName("V2");
        $contract->setCategory($category);

        $creator = new User();
        $creator->setContact("18435186216");
        $creator->setContactType("MOBILE");
        $contract->setCreator($creator);

        /**公司签署方**/
        $companySignatory = new Signatory();
        $companySignatory->setTenantType("COMPANY");
        $companySignatory->setTenantName("思晨教育");
        $companySignatory->setSerialNo(1);

        $receiver = new User();
        $receiver->setContact("18435186216");
        $receiver->setContactType("MOBILE");

        $companySignatory->setReceiver($receiver);

        /**公章签署动作**/
        $companyAction = new Action();
        $companyAction->setType("COMPANY");
        $companyAction->setName("公章签署动作");
        $companyAction->setSerialNo(1);
        /**公章签署操作人**/
        $companyOperator = new User();
        $companyOperator->setContact("18435186216");
        $companyOperator->setContactType("MOBILE");

        $companyOperators = array();
        array_push($companyOperators, $companyOperator);
        $companyAction->setOperators($companyOperators);

        /**审批动作**/
        $auditAction = new Action();
        $auditAction->setType("AUDIT");
        $auditAction->setName("审批动作");
        $auditAction->setSerialNo(3);
        /**审批操作人**/
        $auditOperator = new User();
        $auditOperator->setContact("18435186216");
        $auditOperator->setContactType("MOBILE");

        $auditOperators = array();
        array_push($auditOperators, $auditOperator);
        $auditAction->setOperators($auditOperators);

        /**法人签署动作**/
        $lpAction = new Action();
        $lpAction->setType("LP");
        $lpAction->setName("法人签署动作");
        $lpAction->setSerialNo(4);

        $actions = array();
        /**公司签署方设置公章签署动作**/
        array_push($actions, $companyAction);
        /**公司签署方设置审批动作**/
        array_push($actions, $auditAction);
        /**公司签署方设置审批动作**/
        array_push($actions, $lpAction);

        $companySignatory->setActions($actions);

        /**个人签署方**/
        $personalSignatory = new Signatory();
        $personalSignatory->setTenantType("PERSONAL");
        $personalSignatory->setTenantName("吉哲");
        $personalSignatory->setSerialNo(2);

        $receiver = new User();
        $receiver->setContact("18435186216");
        $receiver->setContactType("MOBILE");

        $personalSignatory->setReceiver($receiver);

        /**所有签署方**/
        $signatories = array();
        array_push($signatories, $companySignatory);
        array_push($signatories, $personalSignatory);

        $contract->setSignatories($signatories);

        $baseRequest = new ContractDraftRequest($contract);

        $result = $sdkClient->service($baseRequest);
        if(!$result) {
            return false;
        }
        if(!isset($result['code']) || $result['code'] != 0) {
            print_r($result);
            return false;
        }
        print("创建合同草稿成功，合同ID：".$result['result']['id']."\n");
        return $result;
    }

    /**
     * 根据文件添加文档
     * @param SDKClient $sdkClient
     * @return mixed|null|string
     */
    function testDocumentAddByFile($contractId, $bizId, SDKClient $sdkClient){

        $documentAddByFileRequest = new DocumentAddByFileRequest();
        $documentAddByFileRequest->setContractId($contractId);
        $documentAddByFileRequest->setBizId($bizId);

        $file_path = "C:/Users/QYS/Desktop/Test/劳动合同_带参数.docx";

        $file_path = iconv("UTF-8", "GBK", realpath($file_path));

        $file = new \CURLFile($file_path);

        $documentAddByFileRequest->setFile($file);
        $documentAddByFileRequest->setFileSuffix('docx');
        $documentAddByFileRequest->setTitle('V2添加文档1');
        $result = $sdkClient->service($documentAddByFileRequest);
        if(!$result) {
            return false;
        }
        if(!isset($result['code']) || $result['code'] != 0) {
            print_r($result);
            return false;
        }
        print("根据文件添加合同文档成功，文档ID：".$result['result']['documentId']."\n");
        return $result;
    }

    /**
     * 根据模板添加文档
     * @param SDKClient $sdkClient
     * @return mixed|null|string
     */
    function testDocumentAddByTemplate($contractId, $bizId, SDKClient $sdkClient){

        $documentAddByTemplateRequest = new DocumentAddByTemplateRequest();
        $documentAddByTemplateRequest->setContractId($contractId);
        $documentAddByTemplateRequest->setBizId($bizId);
        $documentAddByTemplateRequest->setTitle('V2添加模板文档');
        $documentAddByTemplateRequest->setTemplateId('2560778409594396776');
        /**填写模板参数**/
        $templateParam1 = new TemplateParam();
        $templateParam1->setName("乙方姓名");
        $templateParam1->setValue("张三");

        $templateParams = array();
        array_push($templateParams, $templateParam1);

        $documentAddByTemplateRequest->setTemplateParams($templateParams);
        $result = $sdkClient->service($documentAddByTemplateRequest);
        if(!$result) {
            return false;
        }
        if(!isset($result['code']) || $result['code'] != 0) {
            print_r($result);
            return false;
        }
        print("根据模板添加合同文档成功，文档ID：".$result['result']['documentId']."\n");
        return $result;
    }

    /**
     * 发起合同
     * @param SDKClient $sdkClient
     * @return mixed|null|string
     */
    function testSendContract($contractId, $bizId, $documentId, $signatoryId, $actionId, SDKClient $sdkClient){

        $contractSendRequest = new ContractSendRequest();
        $contractSendRequest->setContractId($contractId);
        $contractSendRequest->setBizId($bizId);

        $stamper1 = new Stamper();
        $stamper1->setType('COMPANY');
        $stamper1->setActionId($actionId);
        $stamper1->setDocumentId($documentId);
        $stamper1->setSealId('2566229349702860958');
        $stamper1->setKeyword('劳动');
        $stamper1->setKeywordIndex('2');
        $stamper1->setOffsetX('0.1');
        $stamper1->setOffsetY('-0.1');

        $stamper2 = new Stamper();
        $stamper2->setType('COMPANY');
        $stamper2->setActionId($actionId);
        $stamper2->setDocumentId($documentId);
        $stamper2->setSealId('2566229349702860958');
        $stamper2->setPage('1');
        $stamper2->setOffsetX('0.5');
        $stamper2->setOffsetY('0.5');

        $stamper3 = new Stamper();
        $stamper3->setType('PERSONAL');
        $stamper3->setSignatoryId($signatoryId);
        $stamper3->setDocumentId($documentId);
        $stamper3->setPage(1);
        $stamper3->setOffsetX(0.9);
        $stamper3->setOffsetY(0.9);

        $stampers = array();
        array_push($stampers, $stamper1);
        array_push($stampers, $stamper2);
        array_push($stampers, $stamper3);

        $contractSendRequest->setStampers($stampers);
        $result = $sdkClient->service($contractSendRequest);
        if(!$result) {
            return false;
        }
        if(!isset($result['code']) || $result['code'] != 0) {
            print_r($result);
            return false;
        }
        print("发起合同成功"."\n");
        return $result;
    }

    /**
     * 审批合同
     * @param $sdkClient
     * @return mixed
     */
    function testContractAudit($contractId, $bizId, SDKClient $sdkClient){
        $contractAuditRequest = new ContractAuditRequest();
        $contractAuditRequest->setContractId($contractId);
        $contractAuditRequest->setBizId($bizId);

        $audutOperator = new User();
        $audutOperator->setContact('18435186216');
        $audutOperator->setContactType('MOBILE');
        $contractAuditRequest->setEmployee($audutOperator);
        $contractAuditRequest->setPass(true);
        $contractAuditRequest->setComment('同意');
        $result = $sdkClient->service($contractAuditRequest);
        if(!$result) {
            return false;
        }
        if(!isset($result['code']) || $result['code'] != 0) {
            print_r($result);
            return false;
        }
        print("审批合同成功"."\n");
        return $result;
    }

    /**
     * 公司公章签署
     * @param $sdkClient
     * @return mixed
     */
    function testCompanysign($contractId, $bizId, $documentId, SDKClient $sdkClient){
        $contractCompanySignRequest = new ContractCompanySignRequest();
        $contractCompanySignRequest->setContractId($contractId);
        $contractCompanySignRequest->setBizId($bizId);
        /**公章签署**/
        $stamper1 = new Stamper();
        $stamper1->setType('COMPANY');
        $stamper1->setDocumentId($documentId);
        $stamper1->setSealId('2566229349702860958');
        $stamper1->setKeyword('劳动');
        $stamper1->setKeywordIndex('2');
        $stamper1->setOffsetX('0.2');
        $stamper1->setOffsetY('-0.2');
        /**时间戳签署**/
        $stamper2 = new Stamper();
        $stamper2->setType('TIMESTAMP');
        $stamper2->setDocumentId($documentId);
        $stamper2->setSealId('2566229349702860958');
        $stamper2->setPage('1');
        $stamper2->setOffsetX('0.5');
        $stamper2->setOffsetY('0.5');
        /**骑缝章签署**/
        $stamper3 = new Stamper();
        $stamper3->setType('ACROSS_PAGE');
        $stamper3->setDocumentId($documentId);
        $stamper3->setSealId('2566229349702860958');
        $stamper3->setOffsetY('0.5');
        $stampers = array();
        array_push($stampers, $stamper1);
        array_push($stampers, $stamper2);
        array_push($stampers, $stamper3);
        $contractCompanySignRequest->setStampers($stampers);
        $result = $sdkClient->service($contractCompanySignRequest);
        if(!$result) {
            return false;
        }
        if(!isset($result['code']) || $result['code'] != 0) {
            print_r($result);
            return false;
        }
        print("公章签署成功"."\n");
        return $result;
    }

    /**
     * 法人签署
     * @param SDKClient $sdkClient
     * @return mixed|null|string
     */
    function testLpSign($contractId, $bizId, $documentId, SDKClient $sdkClient){
        $contractLpSignRequest = new ContractLpSignRequest();
        $contractLpSignRequest->setContractId($contractId);
        $contractLpSignRequest->setBizId($bizId);
        /**关键字定位**/
        $stamper1 = new Stamper();
        $stamper1->setType('LP');
        $stamper1->setDocumentId($documentId);
        $stamper1->setKeyword('劳动');
        $stamper1->setKeywordIndex('2');
        $stamper1->setOffsetX('0.1');
        $stamper1->setOffsetY('-0.1');
        /**坐标定位**/
        $stamper2 = new Stamper();
        $stamper2->setType('LP');
        $stamper2->setDocumentId($documentId);
        $stamper2->setPage('1');
        $stamper2->setOffsetX('0.5');
        $stamper2->setOffsetY('0.5');

        $stampers = array();
        array_push($stampers, $stamper1);
        array_push($stampers, $stamper2);

        $contractLpSignRequest->setStampers($stampers);
        $result = $sdkClient->service($contractLpSignRequest);
        if(!$result) {
            return false;
        }
        if(!isset($result['code']) || $result['code'] != 0) {
            print_r($result);
            return false;
        }
        print("法人签署成功"."\n");
        return $result;
    }

    /**
     * 合同签署页面
     * @param SDKClient $sdkClient
     * @return mixed|null|string
     */
    function testContractPage($contractId, $bizId, SDKClient $sdkClient){
        $contractPageRequest = new ContractPageRequest();
        $contractPageRequest->setContractId($contractId);
        $contractPageRequest->setBizId($bizId);

        $user = new User();
        $user->setContact("18435186216");
        $user->setContactType("MOBILE");

        $contractPageRequest->setUser($user);
        $result = $sdkClient->service($contractPageRequest);
        if(!$result) {
            return false;
        }
        if(!isset($result['code']) || $result['code'] != 0) {
            print_r($result);
            return false;
        }
        print("获取合同签署页面成功，签署页面链接：".$result['result']['pageUrl']."\n");
        return $result;
    }

    /**
     * 合同下载(返回文件流)
     * @param SDKClient $sdkClient
     * @return
     */
    function testContractDownload($contractId, $bizId, SDKClient $sdkClient, $filePath){
        $contractDownloadRequest = new ContractDownloadRequest();
        $contractDownloadRequest->setContractId($contractId);
        $contractDownloadRequest->setBizId($bizId);
        $result = $sdkClient->service($contractDownloadRequest);
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
            print('下载文件失败');
            exit(0);
        }else{
            print('下载文件完成,字节数:'.$answer);
        }
        return $answer;

    }