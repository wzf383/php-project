<?php
session_start();

if(!isset($_SESSION['name'])){
 
 //

	 echo "<script>alert('请先登录');location.href='index.php';</script>";
         exit();

}

$id=$_GET['id'];


$link=mysqli_connect("localhost","root","","guest") or die("数据库链接失败");
mysqli_query($link,"set names utf8");



    $sql="delete from guestlist where id=$id";



 
mysqli_query($link,$sql);


  if(mysqli_affected_rows($link)>0){
      
  



  // echo  $_Session['name'];
  //	echo "插入成功";
  
   echo "<script>alert('删除成功');location.href='index.php';</script>";
  }else{
  	  echo "<script>alert('删除失败');location.href='index.php';</script>";
  }