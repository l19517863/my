<?php

    header("Content-type:image/png");
    $Bpath = "./images/img5.jpg";
    $thumbW = 702;
    $thumbH = 512;
    $thumb = imagecreatetruecolor($thumbW,$thumbH);
    $Bimg = imagecreatefromjpeg($Bpath);
    

    list($BimgW,$BimgH) = getimagesize($Bpath);
    $per = 1;

        // $per1 = round($thumbW/$BimgW,2);
        // $per2 = round($thumbH/$BimgH,2);
        // $per = $per1<$per2 ? $per1:$per2;
    $backColor = imagecolorallocate($thumb,150,150,150); //背景色
    imagefill($thumb, 0, 0, $backColor);
    $thumbWP = $BimgW*$per; // 缩略版大小
    $thumbHP = $BimgH*$per;
    var_dump($thumbWP,$thumbHP);
    $Hx =0;// 3，4. 最终 缩略图部分 在 画板 位置
    $Hy =0;
    $Tx = 10;// 略缩图在 缩略版 位置
    $Ty = 0;
    $BimgW = 200;// 缩放(显示部分占比)
    $BimgH = 200;
    $thumbWP = $BimgW*1.95;// 略缩版大小 $Bimg 可以说 就是 这个 的大小
    $thumbHP = $BimgH*1.95;
    // imagecopyresampled($thumb,$Bimg,0,0,0,0,$thumbWP*1.9,$thumbHP*1.9,$BimgW*1.9,$BimgH*1.9);
    imagecopyresampled($thumb,$Bimg,$Hx,$Hy,$Tx,$Ty,$thumbWP,$thumbHP,$BimgW,$BimgH);
    // 0.从$Bimg中 截取 所需 部分，2. 进行 缩小或放大 3.放入$thumb 指定位置
        // 1.缩略图(画板)句柄 2.原图句柄
        
        // 5，6.$Bimg 所需 部分 在 $Bimg 起始坐标:: 默认 为 0,0
        // 9,10.$Bimg 所需 部分 的宽高 ::默认为 $Bimg 的原始高度宽度(显示全部)

        // 7，8.对 $Bimg所需部分 进行宽度 高度 设置(缩小放大)::  缩放系数

        // 3，4. 最终 缩略图部分 在 画板 位置  :: 默认 为 0,0  缩放后的宽高 应与 画板 宽高 一致

    ob_clean();
    imagejpeg($thumb);

    













?>