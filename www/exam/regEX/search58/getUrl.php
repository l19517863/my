<?php
// require_once "./config/conn.php";

function getUrl(){
    global $pdo;
    static $err_count =0;
    static $begin = 0;
    static $getGone =false;
        
        // 获取 房源连接
        $aa = rand(1,15);
    for ($j=$aa ; $j <=$aa+1 ; $j++) {
        sleep(rand(2,6));
        $str = file_get_contents("http://bj.58.com/chuzu/pn{$j}/?PGTID=0d3090a7-0000-1415-3e6a-7b98e926841f&ClickID={$j}");

        $patt_url = "/<div class=\"des\">.*<h2>.*<a href=\"(.*)\"/Us"; // 非贪婪模式+匹配换行
        $a = preg_match_all($patt_url,$str,$arr_url);

        if($a){
            echo "--------------------------------------正在获取新的URL----------------------------<br>";
            for ($i=0; $i <20 ; $i++) { // count($arr_url[1])
                
                $sql ="insert into list_url (url,page) values(:u,:p)";
                $data[':u'] = $arr_url[1][$i];
                $data[':p'] = $j;
                $pdo2 = $pdo->prepare($sql);
                $num = $pdo2 ->execute($data);
                $id = $pdo->lastInsertId();
                

                echo "已获取第".$id."条URL<br>";

            }
            echo "--------------------------------------新的 URL 采集 完毕----------------------------<br>";
            return 1;
        }else if(++$err_count<3){
            echo "---------采集URL错误连续发生{$err_count}次------------";
            $handle = fopen("err.txt","a+");
            $str = date("Y-m-d H:i:s")."\r\n"."采集URL错误连续发生{$err_count}次,睡眠{$s},秒后继续采集\r\n";
            fwrite($handle,$str);
            fclose($handle);
            $s = rand(30*$err_count,60*$err_count);
            echo "-------------睡眠{$s},秒后继续采集----------<br>";
            sleep($s);
            getUrl();
        }else{
            echo "采集URL错误连续发生{$err_count}次,已停止程序<br>";
            $handle = fopen("err.txt","a+");
            $str = date("Y-m-d H:i:s")."\r\n"."采集URL错误连续发生{$err_count}次,已停止程序\r\n";
            fwrite($handle,$str);
            fclose($handle);
            exit;
        }
        
    }
    // var_dump($data);
}







?>