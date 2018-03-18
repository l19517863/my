<?php

        //  直接 写入 不需要打开    覆盖
    $str = "www.aaa.com";
    file_put_contents('put_contents.txt',$str);
    echo "已将内容".$str."写入到 put_contents.txt";






?>