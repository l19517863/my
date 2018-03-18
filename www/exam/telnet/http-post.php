<?php
    define('CRLF',"\r\n");
    $host = 'a.a';
    $port = 80;
    $link = fsockopen($host,$port);
    $a = "exam/telnet/post.php";
    $requestDATE = '';

    $requestDATE = "POST /exam/telnet/post.php HTTP/1.1".CRLF;
    $requestDATE .= "Host: a.a".CRLF;
    $requestDATE .= "Connection: keep-alive".CRLF;
    $data = "name=aa&pwd=";
    $dataLen = strlen($data);
    $requestDATE .= "Content-Length: {$dataLen}".CRLF;
    $requestDATE .= "Cache-Control: max-age=0".CRLF;
    $requestDATE .= "Origin: http://a.a".CRLF;
    $requestDATE .= "Upgrade-Insecure-Requests: 1".CRLF;
    $requestDATE .= "Content-Type: application/x-www-form-urlencoded".CRLF;
    $requestDATE .= "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36".CRLF;
    $requestDATE .= "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8".CRLF;
    $requestDATE .= "Referer: http://a.a/exam/telnet/post.html".CRLF;
    $requestDATE .= "Accept-Encoding: gzip, deflate".CRLF;
    $requestDATE .= "Accept-Language: zh-CN,zh;q=0.9".CRLF;
    
    $requestDATE .= CRLF;
    $requestDATE .= $data;

    fwrite($link,$requestDATE);
    while ($str = fgets($link)) {
        echo $str;
    }

    echo "\n".iconv("utf-8",'gbk','啊啊');
    
    fclose($link);





?>