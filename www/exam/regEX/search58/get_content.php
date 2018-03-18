<?php
require_once "./config/conn.php";
include_once "./function/getConPart.php";
include_once "./getUrl.php";
        set_time_limit(0); // 设置 不限时
        ob_end_clean(); // 清空缓存区
        ob_implicit_flush(1); // 每个 echo 都会 输出 不会 全部 一起 输出
        
        
        go();
    function go(){
        global $pdo;
        static $getUrlCount = 0;
        $begin = 0; // 默认为 1
        if(is_file('go_on.txt')){
            $handle = fopen("go_on.txt","r");
            $begin = fgets($handle);
            fclose($handle);
        }
        echo "------------------------------------------------开始采集房源信息-------------------------------------------------<br>";
        $sql ="select * from list_url where id>{$begin} limit 5;";
        var_dump($sql);

        $house_data = $pdo->query($sql);
        $count = $house_data->rowCount();
        
        if($house_data!=false ){
            $house_infos = $house_data->fetchAll();
            // var_dump($house_infos);
            if($house_infos){
                U2($house_infos);
            }else{
                if(1||$getUrlCount<10){
                    echo "----------------检测发现，不存在URL，或存在的URL采集完毕---------------------<br>";
                    echo "-----------------------------------开始自动采集房源URL---------------------------------------<br>";
                    $getUrlCount++;
                    $handle = fopen("err.txt","a+");
                    $str = date("Y-m-d H:i:s")."\r\n"."存在URL采集完毕，自动采新的房源URL($getUrlCount)次\r\n";
                    fwrite($handle,$str);
                    fclose($handle);
                    getUrl();
                    echo "-----------继续采集信息----<br>";
                    go();
                }else {
                    echo "采集url 过多次，停止自动收集";
                    $handle = fopen("err.txt","a+");
                    $str = date("Y-m-d H:i:s")."\r\n"."由于采集过多数据，下次采集需手动开启，自动采新的房源URL($getUrlCount)次，自动采集停止\r\n";
                    fwrite($handle,$str);
                    fclose($handle);
                    exit;
                }
                
            }
                
        }
        // exit;
        
        

            
    }

            // var_dump($data);

    function U2($house_infos){
        static $u2Count = 0;
        echo "--------------------------U2--------------------------------";
        global $pdo;
        static $err_count = 0;
        for ($i=0; $i <count($house_infos) ; $i++){
              $path = $house_infos[$i]['url'];
              sleep(rand(3*($err_count+1),10*($err_count+1)));// 休眠
               $data = getConpart($path);// 获取 房屋内容信息
               $data[":url_id"] = $house_infos[$i]['id'];
               var_dump($data);


            $sql = "insert into houses_info values (null,:title,:price,:zlfs,:fwlx,:cxlz,:szxq,:phone,:lianxi,:fwpz,:err,:url_id);";

            $pdo2 = $pdo->prepare($sql);

            $num = $pdo2 ->execute($data);
            if($num || $data['err']<2){
                echo "编号{$house_infos[$i]['id']}完成已收集<br>";

                $handle = fopen("go_on.txt","w");
                fwrite($handle,$house_infos[$i]['id']);
                fclose($handle);
            }else {
                echo "编号{$house_infos[$i]['id']}收集出现错误<br>";
                // 错误信息
                $err_count++;
                $handle = fopen("err.txt","a+");
                $str = date("Y-m-d H:i:s")."\r\n编号".$house_infos[$i]['id']."未能正确获取".$data['err']."条\r\n"."错误连续发生{$err_count}次\r\n";
                fwrite($handle,$str);
                fclose($handle);
                if($err_count <= 3){
                    echo "继续搜索<br>";
                    go();// 
                }else {

                    $handle = fopen("err.txt","a+");
                    $str = date("Y-m-d H:i:s")."\r\n编号"."由于错误连续发生{$err_count}次，已停止自动收集\r\n";
                    fwrite($handle,$str);
                    fclose($handle);

                    exit;
                }
                
            }

            //    exit;
        }
        $aa = (++$u2Count)*rand(3,8);
        if($aa>75)
        // header("url='");
        echo "<script>location.href='http://a.a/exam/regEX/search58/get_content.php'</script>";
        
        echo "---------------收集完毕------------------------";
        echo "休眠{$aa}秒后继续收集";
        sleep($aa);
        go();
    }









?>