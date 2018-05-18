<?php
header("Content-type:text/html;charset = utf-8");
require 'dbconfig.php';
require 'functions.php';

//连接MySQL,选择数据库
$link=mysqli_connect(HOST,USER,PASS,"demodb") or die("数据库连接失败");
//$link=mysqli_connect("HOST","USER","PASS","DBNAME");
//mysql_select_db(DBNAME,$link);

//获取action参数的值,并做相应操作
switch ($_GET["action"]){
	case "add";

	//echo $link;

	//exit();
	//var_dump($link);
	//1. 获取添加信息
	$name=$_POST["name"];
	$typeid=$_POST["typeid"];
	$price=$_POST["price"];
	$total=$_POST["total"];
	$note=$_POST["note"];
	
	$addtime=time();
	
	
	
	
	
	//2.验证
	if(empty($name)){
		die("商品名稱必須有值");
	}
	//3.执行图片上传
	$upinfo=uploadFile("pic","../uploads/");
	if($upinfo["error"]===false){
		die("圖片信息上傳失敗:".$upinfo["info"]);
	}else{
		$pic=$upinfo["info"];//获取上传成功的图片名
	}
 	//4.执行图片缩放
	imageUpdateSize('../uploads/'.$pic,50,50);
	//5.拼装sql语句,并执行添加 
	$sql="insert into goods values(null,'$name',$typeid,$price,$total,'$pic','$note',$addtime)";
	echo $sql;
	$a=mysqli_query($link,$sql);

	/*var_dump($a);
	exit();*/
	//6.判断并输出结果
	if(mysqli_insert_id($link)>0){
		echo "商品发布成功";
	}else{
		echo "商品发布失败".mysql_error();
	}
	echo "<br/> <a href='index.php'>查看商品信息</a>";
	break;
	
	
	case "del";
	
	$id=$_GET['id'];
	$sql="delete from goods where id=$id";
	//$sql="delete from goods where id={$_GET['id']}";
	mysqli_query($link,$sql);
	
	//执行图片删除
	if(mysql_affected_rows($link)>0){
		unlink("../uploads/".$_GET['picname']);
		unlink("../uploads/s_".$_GET['picname']);
	}
	
	header("location:index.php");
	
	break;
	
	
	case "update";
	//1.获取要修改的信息
	$name=$_POST["name"];
	$typeid=$_POST["typeid"];
	$price=$_POST["price"];
	$total=$_POST["total"];
	$note=$_POST["note"];
	$id=$_POST['id'];
	$pic=$_POST['oldpic'];
	//2.数据验证
	if(empty($name)){
		die("商品名稱必須有值");
	}
	//3.判断有无图片上传
	if($_FILES['pic']['error']!=4){
		$upinfo=uploadFile("pic","../uploads/");
		if($upinfo["error"]===false){
			die("圖片信息上傳失敗:".$upinfo["info"]);
		}else{
			$pic=$upinfo["info"];//获取上传成功的图片名
			//4.执行图片缩放
			imageUpdateSize('../uploads/'.$pic,50,50);
		}
		
	}
	
	//5.执行修改
	   $sql="update goods set name='{$name}',typeid={$typeid},price={$price},total={$total},note='{$note}',pic='{$pic}' where id=$id";
	   mysqli_query($link,$sql);
	   //6.判断是否修改成功
	    if(mysqli_affected_rows($link)>0){
	    	//若有图片上传,就删除老图片
	    	if($_FILES['pic']['error']!=4){
	    		@unlink("../uploads/".$_POST['oldpic']);
	    		@unlink("../uploads/s_".$_POST['oldpic']);
	    	}
	    	echo "修改成功";
	    }else{
	    	echo "你没有进行修改".mysql_error();
	    }
	    echo "<br/> <a href='index.php'>查看商品信息</a>";
	break; 
}

//关闭数据库
mysqli_close($link);