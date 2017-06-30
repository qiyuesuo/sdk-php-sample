<?php
require_once("BaseSignService.php");
interface StandardSignService extends BaseSignService{

	/**
	 * 运营方公章签署
	 */
	function sign($post_data);
	/**
	 * 运营方法人章签署
	 */
	function signbylegalperson($post_data);
	/**
	 * 查询合同详情
	 * @param documentId				合同文档ID
	 * @return							合同详情
	 */
	function detail($documentId);
	/**
	 * 下载合同清单，包括合同文档和合同详情的pdf文件
	 */
	//function download($documentId,$path);
	function download($documentId);
	/**
	 * 下载单个合同文件
	 */
	//function downloadDoc($documentId,$path);
	function downloadDoc($documentId);
	
	/**
	 * 查询合同分类
	 */
	function queryCategory();
	
}