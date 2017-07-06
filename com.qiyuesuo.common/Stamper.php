<?php
header("Content-Type: text/html; charset=utf-8");
class Stamper{
	private $offsetX;
	private $offsetY;
	private $keyword;
	private $keywordIndex;
	private $page;
	
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
}