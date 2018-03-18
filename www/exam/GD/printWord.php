<?php
// 一，初始化 数据
    $path = './images/img5.jpg';
    $fontSize = 16; // 字体太大 会报错
    $strLen = 4;
    $str[] = "名称";
    $str[] = "类型";
    $str[] = "住所";
    $str[] = "法定代表人";
    $str[] = "成立日期";
    $str[] = "注册";
    $path2 = "./images/yz-s2.png";
    $pixelPer = 0.05; // 噪点系数
    $gd_imgW = 150;
    $gd_imgH = 60;

//0、设置网页格式
    header("Content-type:image/png");
// 开始创建

        // 创建画布
    $gd_img = imagecreatefromjpeg($path);
    $gd_img2 = imagecreatefrompng($path2);
    
    // var_dump($gd_img);
    // exit();
        //获取画布的宽度和高度
    $imgW = imagesx($gd_img);
    $imgH = imagesy($gd_img);
    $imgW2 = imagesx($gd_img2);
    $imgH2 = imagesy($gd_img2);
    
        // 创建颜色
        // 以 150 作为 深浅 的 分割线
    $backColor = imagecolorallocate($gd_img,mt_rand(150,255),mt_rand(150,255),mt_rand(150,255)); //浅背景色
       
        //获取画布的宽度和高度
    $imgW = imagesx($gd_img);
    $imgH = imagesy($gd_img);
    var_dump($imgW);
        //文字的宽度和高度
    $fontW = imagefontwidth($fontSize); 
    $fontH = imagefontheight($fontSize);

    // imagecopymerge($gd_img,$gd_img2,0,0,0,0,10,10,50);
    // imagecopy($gd_img,$gd_img2,10,10,0,0,10,10);

        // 背景颜色
    // imagefill($gd_img, 0, 0, $backColor);
    $fontColor = imagecolorallocate($gd_img,mt_rand(150,255),mt_rand(150,255),mt_rand(150,255)); //浅背景色
    imagettftext($gd_img,$fontSize,0,225,230-5,$fontColor,'./font/SIMYOU.TTF',$str[0]);
    imagettftext($gd_img,$fontSize,0,225,260-5,$fontColor,'./font/SIMYOU.TTF',$str[1]);
    imagettftext($gd_img,$fontSize,0,225,290-5,$fontColor,'./font/SIMYOU.TTF',$str[2]);
    imagettftext($gd_img,$fontSize,0,225,320-5,$fontColor,'./font/SIMYOU.TTF',$str[3]);
    imagettftext($gd_img,$fontSize,0,225,350-5,$fontColor,'./font/SIMYOU.TTF',$str[4]);
    imagettftext($gd_img,$fontSize,0,490,195+5,$fontColor,'./font/SIMYOU.TTF',$str[5]);
    
    
    
    
    
    
    list($b_w,$b_h) = getimagesize($path);
    list($f_w,$f_h) = getimagesize($path2);

        // 清空缓存区 并 输出图片·
        ob_clean();
        imagecopy($gd_img,$gd_img2,$b_w-$f_w, $b_h-$f_h, 0, 0, $f_w, $f_h);
    // imagepng($gd_img);
    imagejpeg($gd_img);
    imagejpeg($gd_img,"hello.jpg");





?>