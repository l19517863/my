<?php
include_once "./php/randWordArrCN.php";
header("Content-type:image/png");
        // 初始化
    $pixelPer = 0.05;
    $fontSize = 20;
    $strLen = 2;
    $str = randWordArrCN($strLen);

        // 创建画布
    $img = imagecreatetruecolor(200,90);
    $imgW = imagesx($img);
    $imgH = imagesy($img);
        // 背景颜色
    $backColor = imagecolorallocate($img,mt_rand(150,255),mt_rand(150,255),mt_rand(150,255));
    imagefill($img, 0, 0, $backColor);

        // 添加文字
    for ($i=0; $i < $strLen ; $i++) {
        $fontColor = imagecolorallocate($img,mt_rand(0,150),mt_rand(0,150),mt_rand(0,150)); // 字体颜色
        imagettftext($img,$fontSize,mt_rand(-30,30),$imgW/$strLen*$i+($imgW/$strLen/2)-($fontSize/2),mt_rand($fontSize,$imgH),$fontColor,'./font/STCAIYUN.TTF',$str[$i]);
    }
        // 添加噪点
    for($i=0;$i<$imgW*$imgH*$pixelPer;$i++){
        $pixelColor = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255),mt_rand(0,255));
        imagesetpixel($img,mt_rand(0,$imgW),mt_rand(0,$imgH), $pixelColor);
    }
        // 添加干扰线
    for($i=0;$i<5;$i++){
        $linecolor = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255)); 
        imageline($img, mt_rand(0+$fontSize,$imgW-$fontSize), mt_rand(0+$fontSize,$imgH-$fontSize), mt_rand(0+$fontSize,$imgW-$fontSize), mt_rand(0+$fontSize,$imgH-$fontSize),$linecolor);
    }

    ob_clean();
    imagepng($img);



?>