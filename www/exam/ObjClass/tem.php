<?php

    $str = "搜索啊啊啊asdass";
    $a = iconv('utf-8','gbk',$str);
    // mb_detect_encoding();
    // function to
        $encode = mb_detect_encoding($a, array("UTF-8","GBK","GB2312","ASCII","BIG5")); 
        if ($encode){
            echo "该字符串是".$encode."<br>";
            // $keytitle = iconv("UTF-8","GBK",$keytitle); 
        }

        phpinfo();



?>