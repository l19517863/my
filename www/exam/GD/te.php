<?php
//设置网页以图片形式输出
header("Content-type:image/png");
//定义底层普通
$src = "./images/img5.jpg";
//定义水印图片
$dsc = "./images/logo.png";
$dsc2 = "./images/yz-s.png";
//创建 背景图
$backImg = imagecreatefromjpeg($src);
//创建 水印图
$floatImg = imagecreatefrompng($dsc);
$floatImg2 = imagecreatefrompng($dsc2);
//获取原始图片宽度和高度
    var_dump(getimagesize($src));
    // exit();
list($b_w,$b_h) = getimagesize($src);
list($f_w,$f_h) = getimagesize($dsc);
//将图片复制到目标图片上
// 背景 水印 水印 x 水印 y 水印 w 水印 y 透明度
// imagecopymerge($backImg,$floatImg, $b_w-$f_w+30, 50, 0, 0, $f_w, $f_h,50);
//如果图片是 png 或 背景是透明的需要使用 imagecopy 来添加水印
// imagecopymerge($backImg,$floatImg2, $b_w-$f_w, $b_h-$f_h, 0, 0, $f_w, $f_h);
ob_clean();
imagecopy($backImg,$floatImg2, $b_w-$f_w, $b_h-$f_h, 0, 0, $f_w, $f_h);
imagepng($backImg);
?>