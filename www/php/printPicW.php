<?php
// header("Content-type:image/png");
        // 1.图片路径 2.水印路径 3.是否随机名 4.是否覆盖图片(同名图片)
    function printPicW($file,$file2= "../images/logo.png",$isRandName=0,$isCover=0){
    $path = $file;
    $path2 = $file2;

        if(@getimagesize(iconv('utf-8','gbk',$file)) && @getimagesize(iconv('utf-8','gbk',$file2))){
            $picType = str_LastType($file);
            $picType = ($picType=='jpg') ? 'jpeg':$picType;
            $imagecreatefromType = "imagecreatefrom".$picType;
            $imageType = "image".$picType; // 输出 底图
            $fileName = pathinfo($file)['filename'];
            $fileDirName = pathinfo($file)['dirname'].'/';
            if($isRandName){
                $fileName = uniqid();
            }

            $picType2 = str_LastType($file2);
            $picType2 = ($picType2=='jpg') ? 'jpeg':$picType2;
            $imagecreatefromType2 = "imagecreatefrom".$picType2;

            $gd_img = $imagecreatefromType(iconv('utf-8','gbk',$path));
            $gd_img2 = $imagecreatefromType2(iconv('utf-8','gbk',$path2));

        }else {
            return 0;
        }

            //获取画布的宽度和高度
        $imgW = imagesx($gd_img);
        $imgH = imagesy($gd_img);

        list($b_w,$b_h) = getimagesize($path);
        list($f_w,$f_h) = getimagesize($path2);

        // $imageType($gd_img);// 输出 图片到网页
        // $imageType($gd_img,$fileName.'.'.str_LastType($file));
        
            $i=0;
            $newFileName = $fileDirName.$fileName.'.'.str_LastType($file);

        if(!$isCover){

            while (@is_file(iconv('utf-8','gbk',$newFileName))) {
                $newFileName = $fileDirName.$fileName.'.'.++$i.'.'.str_LastType($file);
            }
        }
        var_dump($newFileName);
        //  $newFileName;
        // exit();
        ob_clean();
        // imagecopymerge($gd_img,$gd_img2,0,0,0,0,10,10,50);
        imagecopy($gd_img,$gd_img2,$b_w-$f_w, $b_h-$f_h, 0, 0, $f_w, $f_h);
        //  $imageType($gd_img,$newFileName);// 底图格式输出
        imagepng($gd_img,iconv('utf-8','gbk',$newFileName));

    }


    // path:string 2.是否输出小数点:bool
function str_LastType($str,$isPoint=false){
    "use strict";
    if($isPoint)
    return substr($str,strrpos($str,"."));

    return substr($str,strrpos($str,".")+1);
}
?>