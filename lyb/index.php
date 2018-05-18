<?php
session_start();

 $link=mysqli_connect("localhost","root","","guest") or die("数据库链接失败");
mysqli_query($link,"set names utf8");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<script type="text/javascript">
		
		function test(){

         
          
			if(document.denglu.username.value==''){

				alert('请先填写正确的用户名密码登录才能留言');

				return false;
			}else{

			

				return false;
				}
			








			if(document.for.title.value==''){

				alert('请填写标题');

				return false;
			}else{

				var num=document.for.title.value.length;

				if(num<1 || num>20){

				alert('请填写5-20个标题字符');

				return false;
				}
			}

			if(document.for.username.value==''){

				alert('请填写用户名');

				return false;
			}else{

				var num=document.for.username.value.length;

				if(num<1 || num>20){

				alert('请填写用户名5-20个字符');

				return false;
				}
			}
            

			if(document.for.content.value==''){

				alert('请填写内容');

				return false;
			}else{

				var num=document.for.content.value.length;

				if(num>100){

				alert('请填写内容100个字符');

				return false;
				}
			}
			

			return true;
		}

		


	</script>
</head>
<body>

<div id="main">

<div id="header">
	
<div id="logo"></div>
<div id="search">
<?php
 


if(isset($_SESSION['name'])){


	echo "<p>欢迎你:{$_SESSION['name']}</p>";
    echo  "<a href='loginout.php'>退出登录</a>";
}else{
	



?>
<form action="logindo.php"  name="denglu"  method="post" >
用户名:<input type="text" name="username" size="12">
密码:<input type="text" name="password" size="12">	
<input type="submit" name="sub" value="登录">


</form>

<?php

}

?>
	


</div>
</div>
	
<div id="left">


<?php

$sql="select count(*) from guestlist";
$result=mysqli_query($link,$sql);

$rum=mysqli_fetch_array($result);//7

//总数
 $total=$rum[0];
 echo "<br/>";
echo $total."条留言";
/*  $page=new Page($total,2); */
  // 每页个数
 $length=4; 
 
  //总页数
 $pagenum=ceil($total/$length);

 //计算当前页数page
 //$page=$_GET['p']?$_GET['p']:1;

 if(isset($_GET['p'])){

$page=$_GET['p'];
 }else{
  $page=1;
 }
 
 //计算offset
 $offset=($page-1)*$length;

 //上一页
 
 $prepage=$page-1;
 
 if($prepage==0){
 
 	$prepage=1;
 }
 //下一页
 $nextpage=$page+1;
 
 if($nextpage>$pagenum){
 	
 	$nextpage=$pagenum;
 } 
//
  $sql="select * from guestlist order by id limit $offset,$length";
  $ha=mysqli_query($link,$sql);
  while($row=mysqli_fetch_array($ha)){
  	echo"
<h4>{$row['username']}&nbsp;|&nbsp;{$row['adddate']}</h4>
<div>{$row['content']}</div>";

echo "<br/>";

if($row['recontent']!=null){
echo "<div style='color:red;'>管理员回复:{$row['recontent']}</div>";
}
if(isset($_SESSION['name'])){
	if($_SESSION['name']=='wzf'){
 echo "<p><a href='huifu.php?id={$row['id']}'>回复</a>&nbsp;<a href='del.php?id={$row['id']}'>删除</a><p>";
}
}

}
	 echo "<p><a href='index.php?p=1'>首页</a>|<a href='index.php?p={$prepage}'>上一页</a>|
 
 <a href='index.php?p={$nextpage}'>下一页</a>|<a href='index.php?p={$pagenum}'>末页</a></p>";
	?>
<fieldset>
	
<legend>发表留言</legend>


<form action="result.php" method="post"  name="for" onsubmit="return test()" >
	
<table border="0" cellpadding="5" cellspacing="0" width="0">
	
	<tbody><tr>
           <td width="20%">留言标题</td><td><input type="text" name="title" size="30"></td>
        
	</tr>

	<tr>
           <td>用户名网名</td><td><input type="text" name="username" size="30"></td>
        
	</tr>

	<tr>
		
         <td>内容</td><td><textarea name="content" cols="42" rows="5"></textarea></td>

	</tr>

	<tr>
		<td colspan="2" align="center">
			<input type="hidden" name="inblog" value="987">
			<input type="submit"  value="提交">

		</td>


	</tr>
	</tbody></table>
		
</form>
</fieldset>
	</div>




</fieldset>
</div>

</div>

	
</body>
</html>