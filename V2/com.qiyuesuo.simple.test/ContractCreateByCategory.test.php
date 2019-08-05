<?php
header("Content-Type: text/html; charset=utf-8");
    /**
     * 合同根据业务分类创建接口   简单流程测试
     */

    require_once(dirname(__FILE__).'/'."../qiyuesuoSDK/com/qiyuesuo/Util.php");
    require_once(dirname(__FILE__).'/'."ContractCreateByCategory.func.php");

    $sdkClient = Util::getSDk();
    print("===根据业务分类预设签署方创建合同==="."\n");
    $result = testDraftContract($sdkClient);
    if(!isset($result['code']) || $result['code'] != 0) {
        print_r($result);
        exit(0);
    }
    // 合同ID
    $contractId = $result['result']['id'];
    // 业务ID
    $bizId = null;
    // 公章签署节点ID
    $actionId = $result['result']['signatories'][0]['actions'][0]['id'];
    // 文档ID
    $documentId1 = $result['result']['documents'][0]['id'];
    /** 公章签署 */
    $result = testCompanysign($contractId, $bizId, $documentId1, $sdkClient);
    if($result == false) {
        exit(0);
    }
    /** 法人章签署 */
    $result = testLpSign($contractId, $bizId, $documentId1, $sdkClient);
    if($result == false) {
        exit(0);
    }
    /** 获取合同签署页面 */
    $result = testContractPage($contractId, $bizId, $sdkClient);
    exit(0);