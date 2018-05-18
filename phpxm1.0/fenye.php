<?php

require 'fenyec.php';

/* include 'Page.class.php'; */
//2.连接数据库，选择数据库
$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败");
mysql_select_db(DBNAME,$link);

mysql_query("set names utf8");
//3.执行商品信息查询
/* $sql="select count(*) from teacher"; */
$sql="select count(*) from teacher";
$result=mysql_query($sql,$link);

$rum=mysql_fetch_array($result);//7

//总数
 $total=$rum[0];

/*  $page=new Page($total,2); */
  // 每页个数
 $length=2; 
 
  //总页数
 $pagenum=ceil($total/$length);

 //计算当前页数page
 $page=$_GET['p']?$_GET['p']:1;
 
 //计算offset
 $offset=($page-1)*$length;

 //上一页
 
 $prepage=$page-1;
 
 if($prepage==0){
 
 	$prepage=1;
 }
 //下一页
 $nextpage=$page+1;
 
 if($nextpage>$pagenum){
 	
 	$nextpage=$pagenum;
 } 
 //输出每页数据
 $sqlUser="select * from teacher order by id limit $offset,$length"; 
/*  $sqlUser="select * from teacher order by id {$page->limit}"; */
 $a=mysql_query($sqlUser,$link);
 
echo "<table border=1 width=200>";
echo "<tr><th>id</th><th>name</th></tr>";
  while($row=mysql_fetch_array($a)){
 
  	echo  "<tr>
  	
		<td align='center'>{$row['id']}</td>
		<td align='center'>{$row['name']}</td>
		
  			</tr>";
 	
 }


 echo "</table>";
 echo "<p><a href='fenye.php?p=1'>首页</a>|<a href='fenye.php?p={$prepage}'>上一页</a>|
 
 <a href='fenye.php?p={$nextpage}'>下一页</a>|<a href='fenye.php?p={$pagenum}'>末页</a></p>";






