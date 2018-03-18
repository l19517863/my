<?php
    include_once "./php/randWordArr.php";
// 一，初始化 数据
    $fontSize = 5;
    $str = randWordArr(5);


//0、设置网页格式
    header("Content-type:image/png");
// 开始创建
        // 创建画布
    $gd_img = imagecreatetruecolor(200,60);
        //获取画布的宽度和高度
    $imgW = imagesx($gd_img);
    $imgH = imagesy($gd_img);
        // 创建颜色
    $fontColor = imagecolorallocate($gd_img,255,255,255); // 字体颜色
    $backColor = imagecolorallocate($gd_img,150,150,150); //背景色
       
        //获取画布的宽度和高度
    $imgW = imagesx($gd_img);
    $imgH = imagesy($gd_img);
        //后去文字的宽度和高度
    $fontW = imagefontwidth($fontSize);
    $fontH = imagefontheight($fontSize);
    // var_dump($imgW,$imgH,$fontW,$fontH);
    //让文字居中显示9
    $x = ($imgW-$fontW*mb_strlen($str))/2;
    $y = ($imgH-$fontH)/2;

        // 背景颜色
    imagefill($gd_img, 0, 0, $backColor);
        // 绘制文字
    imagestring($gd_img,$fontSize,$x,$y,$str,$fontColor);
        // 清空缓存区 并 输出图片·
        ob_clean();
    imagepng($gd_img);
    // imagepng($gd_img,"hello.png");





?>