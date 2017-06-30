<?php
require_once("BaseSignService.php");
interface RemoteSignService extends BaseSignService{
	
	/**
	 * 企业用户签署
	 */
	function signBycompany($post_data);
	/**
	 * 个人用户签署
	 */
	function signByPerson($post_data);
	/**
	 * 运营方签署
	 */
	function signByPlatform($post_data);
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
	//function downloadZip($documentId,$path);
	function downloadZip($documentId);
	/**
	 * 下载单个合同文件
	 * @param $documentId 文档id
	 */
	//function downloadPdf($documentId,$path);
	function downloadPdf($documentId);
	/**
	 * 获取签署页面链接
	 */
	function signUrl($post_data);
	/**
	 * 获取查看合同页面的链接
	 */
	function viewUrl($post_data);
}