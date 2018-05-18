<?php 
require 'dbconfig.php';

//2.连接数据库，选择数据库
$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败");
mysql_select_db(DBNAME,$link);

if(isset($_GET['pid'])){

	$pid=$_GET['pid'];
}else{
	$pid=0;
}

//判断是否是在根类别下
if($pid>0){
	//根据当前父类别id号获取对应的类别path信息
	$sql="select path from wxfl where id={$pid}";
	$res=mysql_query($sql,$link);
	$path=mysql_result($res,0,0);
	  /*$sql="select * from wxfl where id in({$path}{$pid})";*/
   /* echo $sql;*/
	//获取
	$sql="select id,name from wxfl where id in({$path}{$pid}) order by id ";
	
	$typeres=mysql_query($sql,$link);


}
?>

<html>
<head>

<title>商品信息管理</title>
</head>
<body>
<center>
<?php  include("menu.php");   ?>

 <h3>分层浏览商品信息</h3>
 <div style="width:600px;text-align: left;">
 路径:<a href="index2.php?pid=0">根类别</a>&gt;&gt;

      <?php
            if(isset($typeres)){
            
           if($typeres && mysql_num_rows($typeres)>0){

            while ($row=mysql_fetch_assoc($typeres)) {

                
            echo "<a href=\"index2.php?pid={$row['id']}\">{$row['name']}</a>&gt;&gt;";
               // echo "<a href='index2.php?pid={$row['id']}'>{$row['name']}</a>&gt;&gt;";
           
            }
           }
         }

      ?>
 
 </div>
 <table border="1" width="700">
  <tr>
  <!-- th文字会居中和加粗 -->
      <th>id号</th>  
      <th>类别名称</th>  
      <th>父id</th>  
      <th>路劲</th>  
      <th>操作</th>
         
  
  </tr>
 <?php 
 //从数据库读取信息输出到浏览器表格中
 
 //
/*   if(isset($_GET['pid'])){
   	
   		$pid=$_GET['pid'];
   }else{
   	$pid=0;
   }*/
     //$pid=$_GET['pid']?$_GET['pid']:0;
     //$pid=0;
 // isset($_GET['pid'])?$_GET['pid']:0;
     $sql="select * from wxfl  where pid={$pid} order by concat(path,id)";
     $result=mysql_query($sql,$link);
     
     //var_dump($result);
 //4.解析商品信息(解析结果集)
   
/*      while($row=mysql_fetch_array($result)){
     	echo  "<tr>";
     	echo  "<td>{$row['id']}</td>";
     	echo  "<td>{$row['name']}</td>";
     	echo  "<td>{$row['pic']}</td>";
     			echo  "<td>{$row['price']}</td>";
     			echo  "<td>{$row['total']}</td>";
     			echo  "<td>".date("Y-m-d H:i:s",$row['addtime'])."</td>";
     			echo  "<td>删除  修改</td>";
     	echo  "</tr>";
} */
  while($row=mysql_fetch_assoc($result)){
      echo  "<tr>";
      echo  "<td>{$row['id']}</td>";
      echo  "<td><a href='index2.php?pid={$row['id']}'>{$row['name']}</a></td>";
    
      echo  "<td>{$row['pid']}</td>";
      echo  "<td>{$row['path']}</td>";
      echo  "<td><a href='add.php?pid={$row['id']}&name={$row['name']}&path={$row['path']}{$row['id']},'>添加子类</a>
      
      <a href='action.php?action=del&id={$row['id']}'>删除</a>
      </td>";
      echo  "</tr>";
} 1
 //5.释放结果集，关闭数据库
 ?>
 </table>

</center>
</body>

</html>
