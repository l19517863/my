<?php
// header("Content-type:image/png");
	// 图片类
class Image{

public static $error=[];
	//(检测 是否图片):bool/int 1.图片路径:string
public static function isImage($filePath){
	// var_dump($filePath);
	$types = '|.gif|.jpeg|.png|.bmp'; //定义检查的图片类型
	if(is_file(iconv('utf-8','gbk',$filePath))){
		// echo "存在文件";
		if ($info = @getimagesize($filePath)){

			 $ext = image_type_to_extension($info['2']);
			// var_dump($info);
			// var_dump($types);
			// var_dump($ext);
			// echo stripos($types,$ext);
			return stripos($types,$ext);
  		}
		
	}else{
		self::$error['isImage']=false;
		return 0;
	}
}

	// fn.添加水印():bool. 1.图片路径 2.水印路径 3.是否随机名 4.是否覆盖图片(同名图片)
public static function printPicW($file,$file2= "../images/logo.png",$isRandName=0,$isCover=0){
	$encode = mb_detect_encoding($file, array("UTF-8","GBK","GB2312","ASCII","BIG5")); 
        if ($encode=="CP936"){
            $file = iconv("GBK","UTF-8",$file);
		}
		
	$path = $file;
	$path2 = $file2;
	// echo "水印处理<br>";
	// var_dump($file,$file2);
    if(@getimagesize(iconv('utf-8','gbk',$file)) || getimagesize($file)  && @getimagesize(iconv('utf-8','gbk',$file2))){
        $picType = fn::str_LastType($file);
        $picType = ($picType=='jpg') ? 'jpeg':$picType;
        // $picType = ($picType=='bmp') ? 'wbmp':$picType; // GD库 不支持 bmp 格式 的 图片
        $imagecreatefromType = "imagecreatefrom".$picType;
        $imageType = "image".$picType; // 输出 底图
		$fileName = fn::path_info($file)['filename'];// 增强版pathinfo

        $fileDirName = fn::path_info($file)['dirname'].'/';
        if($isRandName){
            $fileName = uniqid();
        }
        $picType2 = fn::str_LastType($file2);
        $picType2 = ($picType2=='jpg') ? 'jpeg':$picType2;
        $imageType2 = "image".$picType2; // 输出 底图
        $imagecreatefromType2 = "imagecreatefrom".$picType2;

        $gd_img = $imagecreatefromType(iconv('utf-8','gbk',$path));
		$gd_img2 = $imagecreatefromType2(iconv('utf-8','gbk',$path2));


    }else {
        echo "图片有问题<br>";
        return 0;
    }

        //获取画布的宽度和高度
    $imgW = imagesx($gd_img);
    $imgH = imagesy($gd_img);

    list($b_w,$b_h) = getimagesize(iconv('utf-8','gbk',$path));
    list($f_w,$f_h) = getimagesize(iconv('utf-8','gbk',$path2));
    
        
		$i=0;
		$newFileName = $fileDirName.$fileName.'.'.fn::str_LastType($file);
    if(!$isCover){

        while (@is_file(iconv('utf-8','gbk',$newFileName))) {
            $newFileName = $fileDirName.$fileName.'.'.++$i.'.'.fn::str_LastType($file);
        }
	}
	
    ob_clean();
			// 合成 
	if(imagecopy($gd_img,$gd_img2,$b_w-$f_w, $b_h-$f_h, 0, 0, $f_w, $f_h)){
		// echo "合成水印成功<br>";
		self::$error['imagecopy']=true;
		if($imageType($gd_img,iconv('utf-8','gbk',$newFileName)))// 底图格式输出保存
		{
			// echo "成功输出合成图片<br>";
			self::$error['imageTypeEcho']=true;
			return $newFileName;
			// imagepng($gd_img,iconv('utf-8','gbk',$newFileName));
		}
		
	}else {
		self::$error['imagecopy']=false;
	}
	

}

	// fn.验证码():void. 
 public static function EN_Captcha(){






 }

// image 类 结束
}





?>