<?php
session_start();
include "hanshu.php";

$hanshu=new hanshu();

$username=$hanshu->magic($_POST['username']);
$password=$hanshu->magic($_POST['password']);


$link=mysqli_connect("localhost","root","","guest") or die("数据库链接失败");
mysqli_query($link,"set names utf8");



    $sql="select * from user where name='{$username}' and password='{$password}'";


 
mysqli_query($link,$sql);


  if(mysqli_affected_rows($link)>0){
      
   $_SESSION['name']=$username;



  // echo  $_Session['name'];
  //	echo "插入成功";
  
   echo "<script>alert('登录成功');location.href='index.php';</script>";
  }else{
  	  echo "<script>alert('登录失败');location.href='index.php';</script>";
  }


