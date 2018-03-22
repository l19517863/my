<?php
    include_once "./php/randWordArr.php";
// 一，初始化 数据
    $fontSize = 20; // 字体太大 会报错
    $strLen = 4;
    $str = randWordArr($strLen);
    $pixelPer = 0.05; // 噪点系数
    $gd_imgW = 300;
    $gd_imgH = 60;

//0、设置网页格式
    header("Content-type:image/png");
// 开始创建
        // 创建画布
    $gd_img = imagecreatetruecolor($gd_imgW, $gd_imgH);
        //获取画布的宽度和高度
    $imgW = imagesx($gd_img);
    $imgH = imagesy($gd_img);
    
        // 创建颜色
        // 以 150 作为 深浅 的 分割线
    $backColor = imagecolorallocate($gd_img,mt_rand(150,255),mt_rand(150,255),mt_rand(150,255)); //浅背景色
       
        //获取画布的宽度和高度
    $imgW = imagesx($gd_img);
    $imgH = imagesy($gd_img);
        //文字的宽度和高度
    $fontW = imagefontwidth($fontSize); 
    $fontH = imagefontheight($fontSize);
    // var_dump($imgW,$imgH,$fontW,$fontH);
    //让文字居中显示9
    $x = ($imgW-$fontW*mb_strlen($str))/2;
    $y = ($imgH-$fontH)/2;

        // 背景颜色
    imagefill($gd_img, 0, 0, $backColor);
        // 绘制文字
    for ($i=0; $i < $strLen ; $i++) {
        $fontColor = imagecolorallocate($gd_img,mt_rand(0,150),mt_rand(0,150),mt_rand(0,150)); // 字体颜色
        // imagestring($gd_img,$fontSize,$imgW/$strLen*$i+$fontW,mt_rand(0,$imgH-$fontH),$str[$i],$fontColor);
        imagettftext($gd_img,$fontSize,mt_rand(-0,0),$imgW/$strLen*$i+($imgW/$strLen/2)-($fontSize/2),mt_rand($fontSize,$imgH),$fontColor,'./font/STCAIYUN.TTF',$str[$i]);
        
    }

        //随机产生噪点
    for($i=0;$i<$imgW*$imgH*$pixelPer;$i++){
            //随机产生噪点颜色
        $pixelColor = imagecolorallocate($gd_img, mt_rand(0,255), mt_rand(0,255),
        mt_rand(0,255));
            //在页面中绘制出来
        imagesetpixel($gd_img,mt_rand(0,$imgW),mt_rand(0,$imgH), $pixelColor);
    }
        //产生干扰线
    for($i=0;$i<5;$i++){
            // * 随机产生干扰线颜色
        $linecolor = imagecolorallocate($gd_img, mt_rand(0,255), mt_rand(0,255),
        mt_rand(0,255));
            // * 随机划线
        imageline($gd_img, mt_rand(0+$fontSize,$imgW-$fontSize), mt_rand(0+$fontSize,$imgH-
        $fontSize), mt_rand(0+$fontSize,$imgW-$fontSize), mt_rand(0+$fontSize,$imgH-$fontSize),
        $linecolor);
    }
    
        // 清空缓存区 并 输出图片·
        ob_clean();
    imagepng($gd_img);
    // imagepng($gd_img,"hello.png");





?>