<?php

class Page{
	
	public $total;
	public  $length;
	public $pagenum;
	public $page;
	public $offset;
	public  $limit;
	public  $prevpage;
	public $nextpage;
	
   function _construct($total,$length){
   	
   	$this->total=$total;
   	$this->length=$length;
   	$this->page=$_GET['p']?$_GET['p']:1;
   	$this->pagenum=ceil($this->total/$this->length);
   	$this->offset=($this->page-1)*$this->length;
   	$this->limit="limit {$this->offset},{$this->length}";
   	$this->prevpage=$this->page-1;
   	$this->nextpage();
   	
   }
   function  nextpage(){
   	if($this->page>=$this->pagenum){
   		$this->nextpage=$this->pagenum;
   	}else{
   		$this->nextpage=$this->page+1;
   	}
   }
   
   function show(){
   	echo "<p><a href='fenye.php?p=1'>首页</a>|<a href='fenye.php?p={$this->prevpage}'>上一页</a>|
   	
   	<a href='fenye.php?p={$this->nextpage}'>下一页</a>|<a href='fenye.php?p={$this->pagenum}'>末页</a></p>";
   }
}
