<?php
session_start();
include "hanshu.php";

$hanshu=new hanshu();
$id=$_POST['id'];
$title=$hanshu->magic($_POST['title']);
$username=$hanshu->magic($_POST['username']);
$content=$hanshu->magic($_POST['content']);
$recontent=$hanshu->magic($_POST['recontent']);

$link=mysqli_connect("localhost","root","","guest") or die("数据库链接失败");
mysqli_query($link,"set names utf8");



    $sql="update guestlist set title='{$title}',username='{$username}',content='{$content}',recontent='{$recontent}' where id=$id";



 
mysqli_query($link,$sql);


  if(mysqli_affected_rows($link)>0){
      
  



  // echo  $_Session['name'];
  //	echo "插入成功";
  
   echo "<script>alert('回复成功');location.href='index.php';</script>";
  }else{
  	  echo "<script>alert('回复失败');location.href='index.php';</script>";
  }