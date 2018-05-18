<?php



mysql_connect("localhost","root","123");

mysql_select_db("test");
mysqli_query("set names utf8");
$sql="select count(*) from grade";

 $rum=mysqli_query($sql);

 $rum1=mysql_fetch_row($rum);




var_dump($rum1);
/* echo $rum->num_rows; */
