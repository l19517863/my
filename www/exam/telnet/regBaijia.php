<?php
// header('Access-Control-Allow-Origin: *');
    define('CRLF',"\r\n");
    $host = 'www.baijia.com';
    $port = 80;

    $PHPSESSID = '';
    $i =0;
        do{
            $link = fsockopen($host,$port);
            $requestDATE = "GET /protal/member/php/randWordArr.php?yzm HTTP/1.1".CRLF;
            $requestDATE .= "Host: {$host}".CRLF;
            $requestDATE .= "Connection: close".CRLF;
            $requestDATE .= "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36".CRLF;
            if($PHPSESSID != '')
            $requestDATE .= "Cookie: PHPSESSID={$PHPSESSID}".CRLF;
            $requestDATE .= CRLF;
            // $requestDATE .= "Cookie: PHPSESSID=d13035qqp1jban1705v0pbsir0".CRLF;
            
            $requestDATE .= CRLF;
            // $requestDATE .= $data;

            fwrite($link,$requestDATE);
            while ($str = fgets($link)) {
                // echo $str."<br>";
                $PHPSESSID = $str;
            }
            $arr=[];
            $str = mb_substr($PHPSESSID,6);
            list($arr['yzm'],$arr['PHPSESSID']) = explode('<br>',$str);
            // var_dump($arr);
            
            fclose($link);

        // var_dump($PHPSESSID);

            $i++;
        }while ($i<0);
    // $yzm = file_get_contents("http://www.baijia.com/protal/member/php/randWordArr.php?yzm");
    // var_dump($arr);
    // exit();
    $a = "exam/telnet/post.php";
    $requestDATE = '';
    $i ='';
    for ($i=1; $i <= 10000 ; $i++) {
        $uname = "bbbb".$i;
        $data = "username={$uname}&passwd=88888888&yzm={$arr['yzm']}&flag=1";
        $dataLen = strlen($data);

        $link = fsockopen($host,$port);

        $requestDATE = "POST /protal/member/register.php HTTP/1.1".CRLF;
        $requestDATE .= "Host: www.baijia.com".CRLF;
        $requestDATE .= "Connection: close".CRLF;//keep-alive
        $requestDATE .= "Content-Length: {$dataLen}".CRLF;
        $requestDATE .= "Cache-Control: max-age=0".CRLF;
        $requestDATE .= "Origin: http://www.baijia.com".CRLF;
        $requestDATE .= "Upgrade-Insecure-Requests: 1".CRLF;
        $requestDATE .= "Content-Type: application/x-www-form-urlencoded".CRLF;
        $requestDATE .= "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36".CRLF;
        $requestDATE .= "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8".CRLF;
        $requestDATE .= "Referer: http://www.baijia.com/protal/member/register.php".CRLF;
        $requestDATE .= "Accept-Encoding: gzip, deflate".CRLF;
        $requestDATE .= "Accept-Language: zh-CN,zh;q=0.9".CRLF;
        $requestDATE .= "Cookie: PHPSESSID={$arr['PHPSESSID']}".CRLF;
        
        $requestDATE .= CRLF;
        $requestDATE .= $data;

        fwrite($link,$requestDATE);
        while ($str = fgets($link)) {
            // echo $str;
        }

        echo iconv('utf-8','gbk',$uname).":".iconv("utf-8",'gbk','注册成功')."\n";
        //  echo "<br>"."注册成功\n";
        
        fclose($link);
        # code...
    }






?>