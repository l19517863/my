<?php

function randWordArr($num=4){

    $randWordArr = array_merge(range('a','z'),range('A','Z'),range(0,9));
        // 打乱数组
    shuffle($randWordArr);
// var_dump($roundWordArr);
    $rand_keys = array_rand($randWordArr,$num);
    // var_dump($rand_keys);
    $str = '';
    foreach ($rand_keys as $value) {
        
        $str .= $randWordArr[$value];
    }
    return $str;

}
    
    


?>