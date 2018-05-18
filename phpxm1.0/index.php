<html>
<head>

<title >商品信息管理</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="js/npm.js" rel="stylesheet" type="text/css" />
<link href="js/bootstrap.min.js" rel="stylesheet" type="text/css" />


</head>
<body>
<center>

<?php  include("menu.php");   ?>

 <h3 class="text-muted">浏览商品信息</h3>
 
 <table class="table table-hover">

<!--  <table width="700" border="1"> -->
  <tr>
  <!-- th文字会居中和加粗 -->
      <th>商品编号</th>  
      <th>商品名称</th>  
      <th>商品图片</th>  
      <th>单价</th>  
      <th>库存量</th>  
      <th>添加时间</th>
      <th>操作</th>    
  
  </tr>
 <?php 
 //从数据库读取信息输出到浏览器表格中
 
 //1.导入配置文件
    require 'dbconfig.php';
 
 //align='center'.连接数据库，选择数据库
    $link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败");
    mysql_select_db(DBNAME,$link);
 //3.执行商品信息查询
     $sql="select * from goods";
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
      echo  "<th><img src='../uploads/s_{$row['pic']}'/></th>";
      echo  "<td>{$row['price']}</td>";
      echo  "<td>{$row['total']}</td>";
      echo  "<td>".date("Y-m-d H:i:s",$row['addtime'])."</td>";
      echo  "<td><a  class='btn btn-danger' href='action.php?action=del&id={$row['id']}&picname={$row['pic']}'>删除</a>  <a class='btn btn-info' href='edit.php?id={$row['id']}'>修改</a>  <a  class='btn btn-warning' href='addcar.php?id={$row['id']}'>放入购物车</a></td>";
      echo  "</tr>";
} 1
 //5.释放结果集，关闭数据库
 ?>
 </table>
<nav aria-label="Page navigation">
  <ul class="pagination pagination-lg">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>


</center>
<!-- Button trigger modal -->



</body>

</html>