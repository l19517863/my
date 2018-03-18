<?php
    function getdir($path){
        $dir = opendir($path);
        while(($d = readdir($dir)) == true){
        //不让.和..出现在读取出的列表里
        if($d == '.' || $d == '..'){
        continue;
        }
        echo $d.'<br />';
        //判断如果是目录，继续读取
        if(is_dir($path.'/'.$d)){
        getdir($path.'/'.$d);
        }
        }
    }
    $path = './';
    getdir($path);
?>