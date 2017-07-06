<?php
header("Content-Type: text/html; charset=utf-8");
class Contract {
	
	/**
	 * subject 合同主题
	 * expireTime合同过期时间；过期未结束签署，则作废，不传该参数则默认30天后过期。
	 * templateId合同模板ID；合同模板在契约锁云平台维护，请到契约锁云平台查看模板ID
	 * docName 合同文件名称
	 * templateParams合同模版参数，键值对形式字符串，如：｛“product”:“半年定期”, "amount": "10000"｝
	 * html   html格式的合同
	 * file   合同文件
	 * 
	 * receiveType 签署顺序；SEQ（顺序签署）、SIMUL（无序签署）；默认SEQ
	 * categoryId 合同分类ID,分类在契约锁云平台进行维护
	 */
	private $subject;
	private $expireTime;
	private $templateId;
	private $docName;
	private $templateParams;
	private $html;
	private $file;
	
	private $receiveType;
	private $categoryId;
	
	public function set_receiveType($receiveType) {
        $this->receiveType=$receiveType;
    }
    
	public function get_receiveType(){
    	return $this->receiveType;
    }
    
	public function set_categoryId($categoryId) {
        $this->categoryId=$categoryId;
    }
    
	public function get_categoryId(){
    	return $this->categoryId;
    }
	
	
	public function set_subject($subject) {
        $this->subject=$subject;
    }
	public function set_expireTime($expireTime) {
        $this->expireTime=$expireTime;
    }
	public function set_templateId($templateId) {
        $this->templateId=$templateId;
    }
    public function set_docName($docName){
    	$this->docName=$docName;
    }
	public function set_templateParams($templateParams){
    	$this->templateParams=$templateParams;
    }
	public function set_html($html){
    	$this->html=$html;
    }
    
	public function set_file($file){
    	$this->file=$file;
    }
    
    public function get_subject(){
    	return $this->subject;
    }
    
    public function get_expireTime(){
    	return $this->expireTime;
    }
    
	public function get_templateId(){
    	return $this->templateId;
    }
    
	public function get_docName(){
    	return $this->docName;
    }
    
	public function get_templateParams(){
    	return $this->templateParams;
    }
    
    public function get_html(){
    	return $this->html;
    }
    
	public function get_file(){
    	return $this->file;
    }
    
}