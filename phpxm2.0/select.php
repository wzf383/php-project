<html>
<head>

<title>商品信息管理</title>
</head>
<body>
<center>
<?php  include("menu.php");   ?>

 <h3>浏览商品信息</h3>
 
 <select>
 <?php 
 //从数据库读取信息输出到浏览器表格中
 
 //1.导入配置文件
    require 'dbconfig.php';
 
 //2.连接数据库，选择数据库
    $link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败");
    mysql_select_db(DBNAME,$link);
 //3.执行商品信息查询
     $sql="select * from wxfl order by concat(path,id)";
     $result=mysql_query($sql,$link);
     
     //var_dump($result);
 //4.解析商品信息(解析结果集)
   

  while($row=mysql_fetch_assoc($result)){
     $m=substr_count($row['path'],",")-1;
     $strpad=str_pad("",$m*6*2,"&nbsp;");
     
     
               if($row['pid']==0){
            $dbd= "disabled";
               }
              else{
              $dbd="";
              }
    echo "<option  {$dbd}  value='{$row['id']}'>{$strpad}{$row['name']}</option>";
} 

 ?>

</select>
</center>
</body>

</html>