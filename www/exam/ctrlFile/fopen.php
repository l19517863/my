<?php


    $file = "./a.txt";
        // 打开文件 句柄
    $handle = fopen($file,'r');
        // 按量读取
    $str = fread($handle,56); // 文件 句柄 , 读取字节数[英文字母 一个字节/汉字三个字节]
    var_dump($str);
        // 按行 读取
    $str = fgets($handle);
    var_dump($str);
        // 按 每字节(字母) 读取
    $str = fgetc($handle);
    var_dump($str);
        // 关闭 句柄
    fclose($handle);






?>