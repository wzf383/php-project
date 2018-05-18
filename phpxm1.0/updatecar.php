<?php
session_start();
//修改购物车中的信息

//获取要修改的信息
$id=$_GET['id'];
$num=$_GET['num'];

//修改商品信息
$_SESSION["shoplist"][$id]["num"]+=$num;
 if($_SESSION["shoplist"][$id]["num"]<1){
 	$_SESSION["shoplist"][$id]["num"]=1;
 }
//
header("Location:mycar.php");