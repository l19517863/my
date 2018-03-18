<?php
    define('CRLF',"\r\n");
    $host = 'a.a';
    $port = 80;
    $link = fsockopen($host,$port);
    $a = "/exam/telnet/a.php?n=99";
    $requestDATE = '';
    $requestDATE = "GET {$a} HTTP/1.1".CRLF;
    $requestDATE .= "Host: {$host}".CRLF;
    $requestDATE .= "Connection: keep-alive".CRLF;
    $requestDATE .= "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36".CRLF;
    $requestDATE .= CRLF;

    fwrite($link,$requestDATE);
    while ($str = fgets($link)) {
        echo $str;
    }

    echo "结束/n";
    
    fclose($link);





?>