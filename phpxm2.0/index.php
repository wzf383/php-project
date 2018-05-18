<html>
<head>

<title>商品信息管理</title>
</head>
<body>
<center>
<?php  include("menu.php");   ?>

 <h3>浏览商品信息</h3>
 
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
      echo  "<td>{$row['name']}</td>";
    
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