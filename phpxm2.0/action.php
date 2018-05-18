<?php
header("Content-type:text/html;charset = utf-8");
require 'dbconfig.php';


//连接MySQL,选择数据库
$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败");
//$link=mysqli_connect("HOST","USER","PASS","DBNAME");
mysql_select_db(DBNAME,$link);

//获取action参数的值,并做相应操作
switch ($_GET["action"]){
	case "add";
	
	//1. 获取添加信息
	$name=$_POST["name"];
	$pid=$_POST["pid"];
	$path=$_POST["path"];
	
	$sql="insert into wxfl values(null,'{$name}','{$pid}','{$path}')";
	 mysql_query($sql,$link);
	
	if(mysql_insert_id($link)>0){
		echo "添加成功";
	}else{
		echo "添加失败";
	}
	echo "<br/> <a href='add.php'>继续添加</a>";
	break; 
	//var_dump($sql);
	
	case "del":
		$id=$_GET['id'];
		
		$sql="delete from wxfl where id={$id} or path like '%,{$id},%'";
		
		mysql_query($sql,$link);
		
		echo "成功删除".mysql_affected_rows($link)."行";
		
		break;
}
	
	

//关闭数据库
mysql_close($link);