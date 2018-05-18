<?php
 session_start();
//删除购物session中的信息

 
   //判断是删除一个商品还是清空购物车
   if($_GET['id']){
   	//只删除一种商品的购买
   	unset($_SESSION['shoplist'][$_GET['id']]);
   } else{
   	//清空session中商品
   	
   	unset($_SESSION['shoplist']);
   }
  
  
 
 
 //跳转到浏览购物车界面
 header("Location:mycar.php");