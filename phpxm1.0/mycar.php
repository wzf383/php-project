<?php 
 session_start();
?>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="js/bootstrap.min.js" rel="stylesheet" type="text/css" />
<title>商品信息管理</title>
</head>
<body>
<center>
<?php  include("menu.php");   ?>

 <h3>浏览我的购物车</h3>

 <!-- <table border="1" width="600"> -->


 <table class="table-bordered" width="800">
   
   <tr>
   <td align="center" font-weight="bold">商品id号</td><td  align='center'>商品名称</td><td  align='center'>商品图片</td><td  align='center'>单价</td><td align='center'>数量</td><td  align='center'> 小计</td><td align='center'>操作</td>
   
   
   </tr>
   
   <?php 
     /*  <button onclick='alert(\"OK\")'>-</button> */
   $sum=0;//定义总金额的变量
   if(isset($_SESSION["shoplist"])){
    foreach($_SESSION["shoplist"] as $v){
    echo "<tr>";
    echo "<td  align='center'> {$v['id']}  </td>";
    echo "<td  align='center'> {$v['name']}   </td>";
    echo "<td  align='center'> <img src='../uploads/s_{$v['pic']}'/></td>";
    echo "<td  align='center'> {$v['price']}   </td>";
    echo "<td align='center'> 
    
      <button onclick='window.location.href=\"updatecar.php?id={$v['id']}&num=-1\"'>-</button>
   		{$v['num']}
       <button onclick='window.location.href=\"updatecar.php?id={$v['id']}&num=+1\"'>+</button>
    </td>";
    echo "<td  align='center'> ".($v['price']*$v['num'])."</td>";
    echo "<td  align='center'><a href='clearcar.php?id={$v['id']}' class='btn btn-default'>删除</a></td>";
    
    echo "</tr>";
    $sum+=($v['price']*$v['num']);//累计金额
   }
   }
   ?>
  <tr>
    <td align="center" >总计金额:</td>
    <td colspan="5" align="right"><?php echo $sum;?></td>
    <td>&nbsp;</td>
  </tr>
 </table>
 
</center>
</body>

</html>