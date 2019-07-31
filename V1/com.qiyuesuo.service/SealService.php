<?php
interface SealService{
	/**
	 * 查找印章
	 * @param sealId 印章ID
	 * @return
	 */
	function findSeal($sealId);
	/**
	 * 生成企业电子印章
	 * @param company 企业信息
	 * @return
	 */
	function generateSeal($companyName);
	/**
	 * 生成个人电子印章
	 * @param personalName印章上显示的用户名称
	 * @return
	 */
	function generatePersonalSeal($personalName); 
	/**
	 * 获取所有可用的平台印章
	 * @return
	 */
	function sealList();
}