<?php
header("Content-type:text/html;charset = utf-8");
//公共函数库

/* 
 * 文件上传处理函数
 * string filename 要上传的文件表单项名
 * string $path 上传文件的保存路径
 * array 允许的文件类型
 *  array 二个单元:["error"] false:失败,true：成功
 *                ["info"]存放失败原因或成功的文件名
 * 
 *  */

function uploadFile($filename,$path,$typelist=null){
	//1.获取上传文件的名字
	
	$upfile=$_FILES[$filename];
	if(empty($typelist)){
		$typelist=array("image/gif","image/jpg","image/jpeg","image/png");//允许的文件类型
	}
	//$path="upload3";//指定上传文件的保存路径(相对的)
	$res=array("error"=>false);//存放返回的结果
	//2.过滤上传文件的错误号
	if($upfile["error"]>0){
		switch ($upfile["error"]){
			case 1:
				$res["info"]="上传的文件超过了php.ini中uload_max_filesize选项限制";
				break;
			case 2:
				$res["info"]="上传的文件大小超过了HTML表单中MAX_FILE_SIZE选项";
				break;
			case 3:
				$res["info"]="文件只有部分被上傳";
				break;			
			case 4:
				$res["info"]="沒有文件被上傳";
				break;			
			case 6:
				$res["info"]="找不到臨時文件夾";
				break;						
			case 7:
				$res["info"]="文件寫入失敗";
				break;									
			default:
				$res["info"]="未知錯誤";
				break;												
							
		}
		return  $res;
	}
	//3.本次文件大小的限制
	if($upfile["size"]>100000){
		$res["info"]="上傳文件過大";
		require $res;
		
	}
	//
	//4.過濾類型
	if(!in_array($upfile["type"], $typelist)){
		$res["info"]="上傳類型不符!".$upfile["type"];
		return  $res;
	}
	//5.初始化下信息(為圖片產生一個隨機的名字)
	$fileinfo=pathinfo($upfile["name"]);
	do{
		$newfile=date("YmdHis").rand(1000, 9999).".".$fileinfo["extension"];//隨機產生一個的
	}while(file_exists($newfile));
	//6.執行上傳處理
	if(is_uploaded_file($upfile["tmp_name"])){
		if(move_uploaded_file($upfile["tmp_name"], $path."/".$newfile)){
			//將上傳成功后的文件名賦給返回數組
			$res["info"]=$newfile;
			$res["error"]=true;
			return $res;
		}else{
			$res["info"]="上傳文件失敗";
		}
	}else {
		$res["info"]="不是一個上傳的文件";
	}
	
	return $res;
	
	
}

/* 等比縮放函數(以保存的方式實現)
 * string $picname 被縮放的處理圖片源
 * int $maxx 縮放后圖片的最大寬度
 * int $maxy 縮放后圖片的最大高度
 * string  $pre 縮放后圖片名的前綴名
 * return string 返回缩放后的圖片名稱(帶路徑),如a.jpg=>s_a.jpg;
 *  */

  function imageUpdateSize($picname,$maxx=100,$maxy=100,$prc="s_"){
  	$info=getimageSize($picname);//獲取圖片的基本信息
  	
  	$w=$info[0];//獲取寬度
  	$h=$info[1];//獲取高度
  	
  	//獲取圖片的類型並為此創建對應圖片資源
  	switch ($info[2]){
  		case 1://gif
  			$im=imagecreatefromgif($picname);
  			break;	
  			
  		case 2://jpg
  			$im=imagecreatefromjpeg($picname);
  			break;						
  		case 3://png		
  		$im=imagecreatefrompng($picname);
  		    break;
  		default:						
  			die("图片类型错误");			
  			
  	}
  	//计算缩放比例
  	if(($maxx/$w)>($maxy/$h)){
  		$b=$maxy/$h;
  	}else{
  		$b=$maxx/$w;
  	}
  	//计算出缩放后的尺寸
  	$nw=floor($w*$b);
  	$nh=floor($h*$b);
  	//创建一个新的图像源(目标图像)
  	$nim=imagecreatetruecolor($nw, $nh);
  	
  	//执行等比缩放
  	imagecopyresampled($nim, $im, 0, 0, 0, 0, $nw, $nh, $w, $h);
  	//输出图像(根据源图像的类型,输出为对应的类型)
  	$picinfo=pathinfo($picname);//解析源图像的名字和路径信息
  	$newpicname=$picinfo["dirname"]."/".$prc.$picinfo["basename"];
  	switch ($info[2]){
  		case 1:
  			imagegif($nim,$newpicname);
  			break;
  		case 2:
  		    imagejpeg($nim,$newpicname);
  		    break;
  		case 3:
  		    imagepng($nim,$newpicname);
  		    break;
  	}
  	//釋放圖片資源
  	imagedestroy($im);
  	imagedestroy($nim);
  	
  	return $newpicname;
  	
  }

  
 //echo  imageUpdateSize("../uploads/big_img.png",30,30);




















