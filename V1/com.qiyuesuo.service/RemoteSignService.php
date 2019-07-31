<?php
interface RemoteSignService{
	/**
	 *  由pdf文件创建合同
	 */
	function createByLocal(Contract $contract);
	/**
	 * 由合同模板创建合同
	 */
	function createByTemplate(Contract $contract);
	/**
	 * 由html创建合同
	 */
	function createByHtml(Contract $contract);
	
	/**
	 * 企业用户签署 带签名外观
	 */
	function signBycompany($documentId,Company $company,$sealImageBase64,Stamper $stamper);
	/**
	 * 企业用户签署 无签名外观
	 */
	function signBycompanyNoVisible($documentId,Company $company);
	
	/**
	 * 个人用户签署 带签名外观
	 */
	function signByPerson($documentId,Person $person,$sealImageBase64,Stamper $stamper);
	
	/**
	 * 个人用户签署 无签名外观
	 */
	function signByPersonNoVisible($documentId,Person $person);
	
	/**
	 * 运营方签署  带签名外观
	 */
	function signByPlatform($documentId,$sealId,Stamper $stamper);
	/**
	 * 运营方签署  无签名外观
	 */
	function signByPlatNoVisible($documentId);
	/**
	 *  完成签署
	 *  @param $documentId 文档id
	 */
	function complete($documentId);
	/**
	 * 查询合同详情
	 * @param $documentId 文档id
	 */
	function detail($documentId);
	/**
	 * 下载合同清单
	 * @param $documentId 文档id
	 */
	function downloadZip($documentId);
	/**
	 * 下载单个合同文件
	 * @param $documentId 文档id
	 */
	function downloadPdf($documentId);
	/**
	 * 获取公司签署页面链接
	 */
	 function signUrlCompany($documentId,$sealImageBase64,$successUrl,$signCallBackUrl,$operation,Company $company,Stamper $stamper);
	 /**
	  * 获取个人签署页面链接
	  */
	 function signUrlPerson($documentId,$sealImageBase64,$successUrl,$signCallBackUrl,$operation,Person $person,Stamper $stamper);
	/**
	 * 获取查看合同页面的链接
	 */
	function viewUrl($documentId);
	/**
	 * 测试回调地址是否可用
	 */
	 function callbackcheckout($signCallBackUrl);
}