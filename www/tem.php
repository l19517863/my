<?php




        



	////	上传 图片()   表单name:string , 允许类型array[]:string ， 保存路径string ，是否随机名bool
function upfiles($file_name,$allow_type,$savedir="upload/",$israndname=0){
	// method="POST" enctype="multipart/form-data"
	//$allow_type=array('jpeg','jpg','gif','png','bmp');// 添加 允许的  后缀
	//$savedir="upload/";// 存储的目录

		// 自动补斜杆 '/' 
	if(gettype($saveDir)==='string'){
        if(substr($saveDir,-1)=='/'){
            $saveDir = iconv("utf-8",'gbk',$saveDir); //
        }else {
            $saveDir = iconv("utf-8",'gbk',$saveDir)."/";
        }
    }
    
    $files=$_FILES[$file_name];
    
		if($files['error']==0){
				// 获取后缀名
				$filetype = pathinfo($files['name'],PATHINFO_EXTENSION); // 获取文件类型
				$filename = pathinfo($files['name'],PATHINFO_FILENAME); // 获取文件名
				
				if($israndname){
					$filename = uniqid();
				}
					// 允许后缀
				if(in_array($filetype,$allow_type)){
						//判断目录 是否存在 不存在，递归创建 目录;
					if(!file_exists($savedir)){
						mkdir($savedir,0777,true);
					}

					if(move_uploaded_file($files["tmp_name"],$savedir.$filename.".".$filetype)){
						echo "单文件上传成功:".$files['error']."<br>";
						return $savedir.$filename.".".$filetype; // 上传成功 返回 文件名
					}
				
				}else {
                    echo "不能上传该图片格式<br>";
                    return false;
                }

			}else{
				echo "单文件"."上传错误:".$files['error']."<br>";
				   return $upFileInfo[$files['name']]['error']=$files['error'];
			
			}

}
?>

