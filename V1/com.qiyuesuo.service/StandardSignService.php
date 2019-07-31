<?php
interface StandardSignService{
	/**
	 * 由pdf文件创建合同
	 */
	function createByLocal($json_receivers,Contract $contract);
	/**
	 * 由合同模板创建合同
	 */
	function createByTemplate($json_receivers,Contract $contract);
	/**
	 * 由html创建合同
	 */
	function createByHtml($json_receivers,Contract $contract);

	/**
	 * 运营方公章签署
	 */
	function sign($documentId,$sealId,Stamper $stamper,$acrossPage);
	/**
	 * 运营方法人章签署
	 */
	function signbylegalperson($documentId,Stamper $stamper);
	/**
	 * 查询合同详情
	 * @param documentId				合同文档ID
	 * @return							合同详情
	 */
	function detail($documentId);
	/**
	 * 下载合同清单，包括合同文档和合同详情的pdf文件
	 */
	function download($documentId);
	/**
	 * 下载单个合同文件
	 */
	function downloadDoc($documentId);
	
	/**
	 * 查询合同分类
	 */
	function queryCategory();
	
}