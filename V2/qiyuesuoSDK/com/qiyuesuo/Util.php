<?php
header("Content-Type: text/html; charset=utf-8");

/**
 *
 * 契约锁SDK配置类
 *
 */
require_once (dirname(__FILE__).'/sdk/param/'.'ParamSwitcher.php');
require_once (dirname(__FILE__).'/sdk/http/'.'HttpHeader.php');
require_once (dirname(__FILE__).'/sdk/http/'.'HttpConnection.php');
require_once (dirname(__FILE__).'/sdk/http/'.'HttpParameter.php');
require_once (dirname(__FILE__).'/sdk/http/'.'HttpMethod.php');
require_once (dirname(__FILE__).'/sdk/http/'.'HttpClient.php');
require_once (dirname(__FILE__).'/sdk/'.'SDKClient.php');
require_once (dirname(__FILE__).'/sdk/request/'.'SdkRequest.php');

require_once(dirname(__FILE__) . '/sdk/bean/'."Action.php");
require_once(dirname(__FILE__) . '/sdk/bean/'."Attachment.php");
require_once(dirname(__FILE__) . '/sdk/bean/'."Audit.php");
require_once(dirname(__FILE__) . '/sdk/bean/'."Category.php");
require_once(dirname(__FILE__) . '/sdk/bean/'."Company.php");
require_once(dirname(__FILE__) . '/sdk/bean/'."Contract.php");
require_once(dirname(__FILE__) . '/sdk/bean/'."Document.php");
require_once(dirname(__FILE__) . '/sdk/bean/'."Employee.php");
require_once (dirname(__FILE__). '/sdk/bean/'."Seal.php");
require_once(dirname(__FILE__) . '/sdk/bean/'."Signatory.php");
require_once(dirname(__FILE__) . '/sdk/bean/'."Stamper.php");
require_once(dirname(__FILE__) . '/sdk/bean/'."Template.php");
require_once(dirname(__FILE__) . '/sdk/bean/'."TemplateParam.php");
require_once(dirname(__FILE__) . '/sdk/bean/'."User.php");

require_once (dirname(__FILE__).'/sdk/request/'."AttachmentDownloadRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."CategoryListRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."CompanyDetailRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."ContractAuditRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."ContractCompanySignRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."ContractDetailRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."ContractDownloadRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."ContractDraftRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."ContractInvalidRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."ContractLpSignRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."ContractNoticeRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."ContractPageRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."ContractSendRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."DocumentAddByFileRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."DocumentAddByTemplateRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."DocumentDownloadRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."EmployeeCreateRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."EmployeeListRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."EmployeeRemoveRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."EmployeeUpdateRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."SealImageRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."SealListRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."TemplateListRequest.php");
require_once (dirname(__FILE__).'/sdk/request/'."TemplatePageRequest.php");

class Util {
    const url = "https://openapi.qiyuesuo.me";
    const accessKey = "";
    const accessSecret = "";

    public static function getSDk() {
        $url = self::url;
        $accessKey = self::accessKey;
        $accessSecret = self::accessSecret;
        $SDk = new SDKClient($accessKey, $accessSecret, $url);
        return $SDk;
    }

}