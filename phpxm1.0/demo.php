<?php
$a=array();

$a['0']="aa";
$a['1']="bb";

var_dump($a);
print_r($a);

echo  "<br/>";
echo "3";

$str=array(
		"网络编程图书"=>array("A","B","C")
		
		
		);

var_dump($str);

echo $str['网络编程图书'][1]."<br/>";

$v=array("ee"=>"好","ff"=>"不好");

foreach ($v as $key=>$value){
	
	echo $key.":".$value."<br/>";
}

$str1=array(
		"网络编程图书"=>array("啊"=>"A","啊啊"=>"B","啊啊啊"=>"C"),
		"历史图书"=>array("去"=>"AA","去去"=>"BB","去去去"=>"CC"),
		"文学图书"=>array("饿"=>"AAA","饿饿"=>"BBB","饿饿饿"=>"CCC")


);

var_dump($str1);


foreach ($str1 as $key=>$value){
	
	foreach ($value as $ha){
		echo $key.":".$ha."<br/>";
	}
}

$str11=array(
		"网络编程图书"=>array(
				"啊"=>array("1"=>"11","2"=>"22","3"=>"33"),
				"啊啊"=>"B",
				"啊啊啊"=>"C"
				),
		"历史图书"=>array("去"=>"AA","去去"=>"BB","去去去"=>"CC"),
		"文学图书"=>array("饿"=>"AAA","饿饿"=>"BBB","饿饿饿"=>"CCC")


);

var_dump($str11);
var_dump($str11["网络编程图书"]["啊"]);
















