<?php
include_once "./printPicW.php";

	//	上传 图片加水印()		表单name:string , 允许类型array[]:string ， 保存路径string  是否多图片bool ，是否随机名bool，是否覆盖同名图片bool 是否添加水印bool,水印图是否覆盖原图 水印图path:string
function upPicPW($postName,$allowType,$saveDir="upload/",$isMany=0,$isRandName=0,$isCover=1,$isMark=0,$isWMark=0,$markPath=''){
	// method="POST" enctype="multipart/form-data"
	//$allowType=array('jpeg','jpg','gif','png','bmp');// 添加 允许的  后缀
	//$saveDir="upload/";// 存储的目录

		// 防止 忘记 jia '/' 
	if(gettype($saveDir)==='string'){
        if(substr($saveDir,-1)=='/'){
            $saveDir = iconv("utf-8",'gbk',$saveDir); //
        }else {
            $saveDir = iconv("utf-8",'gbk',$saveDir)."/";
        }
    }

	$files=$_FILES[$postName];//
	var_dump($files);
	// exit;
		// 判断 单文件 还是 多文件
	if(!$isMany){
		
		if($files['error']==0){
				// 获取后缀名
				$filetype = pathinfo($files['name'],PATHINFO_EXTENSION); // 获取文件类型
				$filename = path_info($files['name'],PATHINFO_FILENAME)['filename']; // 获取文件名
				// iconc("utf8",'gbk',$files['name']); //乱码使用
				// var_dump($filename);
				// return $filename;
				// exit();
				if($isRandName){
					$filename = uniqid();
				}
					// 允许后缀
				if(in_array($filetype,$allowType)){
						//判断目录 是否存在 不存在 递归创建目录;
					if(!file_exists($saveDir)){
						mkdir($saveDir,0777,true);
					}
						
					if(move_uploaded_file($files["tmp_name"],iconv('utf-8','gbk',$saveDir).iconv('utf-8','gbk',$filename).".".$filetype)){
						
						if(@getimagesize($saveDir.iconv('utf-8','gbk',$filename).".".$filetype)){
							echo "aa";
							if($isMark && isImage($markPath)){
								echo $saveDir.$filename.".".$filetype;
								echo printPicW($saveDir.$filename.".".$filetype,$markPath,0,$isWMark);// 添加水印
								// exit();
							}
							
							// var_dump($saveDir.$filename.".".$filetype);
							return $saveDir.$filename.".".$filetype; // 返回 一个 文件名

						}else{
							// 如果文件格式不正确,那么就删除文件。
							unlink($saveDir.iconv('utf-8','gbk',$filename).".".$filetype);
							return 0;
						}
						
					}
				
				}else{
					echo "上传失败，不允许此格式的图片";
				}

			}
			else {
				echo "单文件"."上传错误:".$files['error']."<br>";
				$upFileInfo[$files['name']]['error']=$files['error'];
			
			}

	}else{
			if(isset($_FILES[$postName]))
		  foreach ($files['error'] as $key => $value) {
			if($value==0){
				// 获取后缀名
				//$lttype = pathinfo($fileArr['name'][$key],PATHINFO_EXTENSION);
				$filetype = pathinfo($files['name'][$key],PATHINFO_EXTENSION);
				
				// $filename = pathinfo($files['name'][$key],PATHINFO_FILENAME);
				$filename = path_info($files['name'][$key],PATHINFO_FILENAME)['filename']; // 获取文件名
				var_dump($filename);
				
				if($isRandName){
					$filename = uniqid();
				}

				if(in_array($filetype,$allowType)){
						
					if(!file_exists($saveDir)){
						mkdir($saveDir,0777,true);
						//判断目录 是否存在 不存在 创建 目录;
					}

					if(move_uploaded_file($files["tmp_name"][$key],$saveDir.iconv('utf-8','gbk',$filename).".".$filetype)){
						echo "第".($key+1)."文件"."上传成功:".$value."<br>";

						
						if(@getimagesize($saveDir.iconv('utf-8','gbk',$filename).".".$filetype)){
							// echo "aa".$saveDir.$filename.".".$filetype;
							
							if($isMark && isImage($markPath)){
								echo $saveDir.$filename.".".$filetype;
								
								echo printPicW($saveDir.$filename.".".$filetype,$markPath,0,$isWMark);// 添加水印
								// exit();
							}
							
							// var_dump($saveDir.$filename.".".$filetype);

							$upFilesInfos[$files['name'][$key]]=$value;// 返回 一个 文件名

						}else{
							// 如果文件格式不正确,那么就删除文件。
							unlink($saveDir.iconv('utf-8','gbk',$filename).".".$filetype);
							$upFilesInfos[$files['name'][$key]]='wrong';
						}


						// $upFilesInfos[$files['name'][$key]]=$value;
					}
				}
			}
			else{
				echo "第".($key+1)."文件"."上传错误:".$value."<br>";
				$upFilesInfos[$files['name'][$key]]=$value;
			
			}
		}
		// var_dump($upFilesInfos);
		return $upFilesInfos;
	}
}
	//检测 是否图片 1.图片路径
function isImage($filePath){
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

		return 0;
	}
}
//增强版的path_info
function path_info($filepath)   
{   
    $path_parts = array();   
    $path_parts ['dirname'] = rtrim(substr($filepath, 0, strrpos($filepath, '/')),"/")."/";   
    $path_parts ['basename'] = ltrim(substr($filepath, strrpos($filepath, '/')),"/");   
    $path_parts ['extension'] = substr(strrchr($filepath, '.'), 1);   
    $path_parts ['filename'] = ltrim(substr($path_parts ['basename'], 0, strrpos($path_parts ['basename'], '.')),"/");   
    return $path_parts;
}

?>