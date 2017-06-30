<?php
interface BaseSignService{
	/**
	 * 由pdf文件创建合同
	 */
	function createByLocal($post_data);
	/**
	 * 由合同模板创建合同
	 */
	function createByTemplate($post_data);
	/**
	 * 由html创建合同
	 */
	function createByHtml($post_data);
}