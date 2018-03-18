<?php

    header("Content-type:image/png");
    $Bpath = "./images/img5.jpg";
    $thumbW = 180;
    $thumbH = 120;
    $thumb = imagecreatetruecolor($thumbW,$thumbH);
    $Bimg = imagecreatefromjpeg($Bpath);
    

    list($BimgW,$BimgH) = getimagesize($Bpath);
    $per = 1;

        $per1 = round($thumbW/$BimgW,2);
        $per2 = round($thumbH/$BimgH,2);
        $per = $per1<$per2 ? $per1:$per2;


    $thumbWP = $BimgW*$per;
    $thumbHP = $BimgH*$per;
    imagecopyresampled($thumb,$Bimg,0,0,0,0,$thumbWP,$thumbHP,$BimgW*.8,$BimgH*.8);
    // 1.从原图中 生成 缩略图，2.截取 所需 缩略图 部分 3.放入画布 指定位置
        // 1.缩略图(画板)句柄 2.原图句柄
        // 3，4. 最终 缩略图部分 在 画板 位置
        // 5，6.所需 缩略图部分 的起始点
        // 7，8.生成 缩略图 的 宽高
        // 9，10. 所需 缩略图部分 的宽高

    ob_clean();
    imagejpeg($thumb);

    













?>