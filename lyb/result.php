<?php
include "hanshu.php";

$hanshu=new hanshu();

$title=$hanshu->magic($_POST['title']);
$username=$hanshu->magic($_POST['username']);
$content=$hanshu->magic($_POST['content']);




/*echo $title.$username.$content;

exit();
*/
 $link=mysqli_connect("localhost","root","","guest") or die("数据库链接失败");
mysqli_query($link,"set names utf8");
  /*$sql="insert into guestlist('id','title','content','recontent','reply','adddate','username') values (null,'{$title}','{$content}',' ',null,'2018/9/9','{$username}')";*/


    $sql="insert into guestlist values (null,'{$title}','{$content}',' ',null,'".date("Y-m-d")."','{$username}')";

//echo $sql;
//exit();
 
$ha=mysqli_query($link,$sql);





  if($ha){

  //	echo "插入成功";
  
   echo "<script>alert('插入成功');location.href='index.php';</script>";
  }else{
  		echo "插入失败";
  }




























