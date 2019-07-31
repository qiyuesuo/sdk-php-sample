<?php
interface  TemplateService{
	/**
	 * 查询运营方在契约锁上维护的合同模板
	 * @return
	 */
	function queryTemplate() ;
	/**
	 * 查询合同模板详情
	 * @param $templateId 模板id
	 * @return
	 */
	function queryTemplateDetail($templateId);
}