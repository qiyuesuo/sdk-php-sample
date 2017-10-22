<?php
header("Content-Type: text/html; charset=utf-8");
class Stamper{
	private $offsetX;//横坐标
	private $offsetY;//纵坐标
	private $keyword;//关键字；用来确定印章的坐标位置
	private $keywordIndex;//关键字索引，默认为1；1代表第一个；-1代表最后一个
	private $page;//印章所在页码
	private $acrossPagePosition;//骑缝章 并指定位置  骑缝章纵坐标百分比（取值范围：大于0 小于1）
	
	public function set_offsetX($offsetX) {
        $this->offsetX=$offsetX;
    }
    public function get_offsetX(){
    	return $this->offsetX;
    }
    
	public function set_offsetY($offsetY) {
        $this->offsetY=$offsetY;
    }
    public function get_offsetY(){
    	return $this->offsetY;
    }
    
	public function set_keyword($keyword) {
        $this->keyword=$keyword;
    }
    public function get_keyword(){
    	return $this->keyword;
    }
    
	public function set_keywordIndex($keywordIndex) {
        $this->keywordIndex=$keywordIndex;
    }
    public function get_keywordIndex(){
    	return $this->keywordIndex;
    }
    
	public function set_page($page) {
        $this->page=$page;
    }
    public function get_page(){
    	return $this->page;
    }
    
    public function set_acrossPagePosition($acrossPagePosition){
    	$this->acrossPagePosition=$acrossPagePosition;
    }
    
    public function get_acrossPagePosition(){
    	return $this->acrossPagePosition;
    }
}