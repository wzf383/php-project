<?php
session_start();
$id=$_GET['id'];

if(!isset($_SESSION['name'])){
 
 //

	 echo "<script>alert('请先登录');location.href='index.php';</script>";
         exit();

}

//echo $id;


$link=mysqli_connect("localhost","root","","guest") or die("数据库链接失败");
mysqli_query($link,"set names utf8");



    $sql="select * from guestlist where id='{$id}'";
$ha=mysqli_query($link,$sql);

while ($row=mysqli_fetch_array($ha)) {

	$title=$row['title'];
	$username=$row['username'];
	$content=$row['content'];
	$recontent=$row['recontent'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<fieldset>
	
<legend>发表留言</legend>


<form action="huifudo.php" method="post"  name="for">
	
<table border="0" cellpadding="5" cellspacing="0" width="0">
	<input type="hidden" name="id" value="<?php  echo $id;   ?>">
	<tbody><tr>
           <td width="20%">留言标题</td><td><input type="text"  value="<?php echo  $title;  ?>" name="title" size="30"></td>
        
	</tr>

	<tr>
           <td>用户名网名</td><td><input type="text"   value="<?php echo  $username;  ?>"      name="username" size="30"></td>
        
	</tr>

	<tr>
		
         <td>内容</td><td><textarea name="content"  cols="42" rows="5">
<?php echo  $content;  ?> 

         </textarea></td>

	</tr>

	<tr>
		
         <td>回复内容</td><td><textarea name="recontent"  cols="42" rows="5">
<?php echo  $recontent;  ?> 
         </textarea></td>

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
</body>
</html>







