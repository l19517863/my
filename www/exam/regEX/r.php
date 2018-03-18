<?php

    $str = "aaab@136.com.bb1234cc";
    $patt_mail = "/^\w+@\w+(\.\w+)+$/";
    $a = preg_match_all($patt_mail,$str,$arr);
    // var_dump($a,$arr);

    $str = "aaavsadgh2222frhyreasdf";
    $patt = "/\d{4}/";
    $str = preg_replace($patt,"***",$str);
    // var_dump($str);

    $a = preg_match_all($patt_mail,$str,$arr);
    // var_dump($a,$arr);

    // 正则分割(匹配分隔符)
    // array preg_split($正则式,$字符串);
    
    $str = "hello apple banana ";
    $patt = "/\b[^a-z]*\b/";
    $arr = preg_split($patt,$str,-1,1);
    var_dump($arr);

    // preg_split()




?>