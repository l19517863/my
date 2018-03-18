<?php
// 一，初始化 数据
    header("Content-type:image/png");
    $path = './images/微信图片_20171126131341.jpg';// 微信图片_20171126131341.jpg
    $fontSize = 16; // 字体太大 会报错

    $path2 = "./images/yz-s2.png";

        // 创建画布
        var_dump(iconv('utf-8','gbk',$path));
        
    $gd_img = imagecreatefromjpeg(iconv('utf-8','gbk',$path)); //iconv('utf-8','gbk','微信图片')
    $gd_img2 = imagecreatefrompng($path2);

    // ob_clean();
    // imagejpeg($gd_img2);
    // exit();
        //文字的宽度和高度
    $fontW = imagefontwidth($fontSize); 
    $fontH = imagefontheight($fontSize);

    list($b_w,$b_h) = getimagesize(iconv('utf-8','gbk',$path));
    list($f_w,$f_h) = getimagesize(iconv('utf-8','gbk',$path2));

        // 清空缓存区 并 输出图片·
        ob_clean();
        imagecopy($gd_img,$gd_img2,$b_w-$f_w, $b_h-$f_h, 0, 0, $f_w, $f_h);
    // imagepng($gd_img);
    imagepng($gd_img);
    // imagejpeg($gd_img,"hello.jpg");



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