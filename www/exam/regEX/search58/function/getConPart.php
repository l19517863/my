<?php



    function getConpart($path){
        
        $house_info = $str = file_get_contents($path);
                // 获取 房源 内容
            // 标题
            $data[':err'] = 0;
            $patt = "/<title>(.*)<\/title>/Us";
            $a = preg_match($patt,$house_info,$result);
            if($a){
                // var_dump($result);
                // exit;
                $data[":title"] = str_replace(" ","",$result[1]);
                // var_dump($data);
                $data[":title"] = str_replace("\r\n","",$data[":title"]);
                // exit;
            }else{
                $data[":title"]="";
                $data[':err']++;
            }
            // 月租
            $patt = "/class=\"f36\">(.*)<\/b>/Us";
            $a = preg_match($patt,$house_info,$result);
            if($a){
                $data[":price"] = str_replace(" ","",$result[1]);
                $data[":price"] = str_replace("\r\n","",$data[":price"]);
            }else{
                $data[":price"]=0;
                $data[':err']++;
            }
            // 租赁方式：
            $patt = "/租赁方式：<\/span><span>(.*)<\/span>/Us";
            $a = preg_match($patt,$house_info,$result);
            if($a){
                $data[":zlfs"] = str_replace(" ","",$result[1]);
                $data[":zlfs"] = str_replace("\r\n","",$data[":zlfs"]);
            }else{
                $data[":zlfs"]="";
                $data[':err']++;
            }
            
            // 房屋类型
            $patt = "/房屋类型：<\/span><span>(.*)<\/span>/Us";
            $a = preg_match($patt,$house_info,$result);
            if($a){
                $data[":fwlx"] = str_replace(" ","",$result[1]);
                $data[":fwlx"] = str_replace("\r\n","",$data[":fwlx"]);
            }else{
                $data[":fwlx"]="";
                $data[':err']++;
            }
            
            // 朝向楼层
            $patt = "/朝向楼层：<\/span><span>(.*)<\/span>/Us";
            $a = preg_match($patt,$house_info,$result);
            if($a){
                $data[":cxlz"] = str_replace(" ","",$result[1]);
                $data[":cxlz"] = str_replace("\r\n","",$data[":cxlz"]);
            }else{
                $data[":cxlz"]="";
                $data[':err']++;
            }
            // 所在小区
            $patt = "/xiaoqu0'\)\">(.*)<\/a>/Us";
            $a = preg_match($patt,$house_info,$result);
            if($a){
                $data[":szxq"] = str_replace(" ","",$result[1]);
                $data[":szxq"] = str_replace("\r\n","",$data[":szxq"]);
            }else{
                $data[":szxq"]="";
                $data[':err']++;
            }
            // 联系电话
            $patt = "/chat-txt\">(.*)<\/span>/Us";
            $a = preg_match($patt,$house_info,$result);
            if($a){
                $data[":phone"] = str_replace(" ","",$result[1]);
                $data[":phone"] = str_replace("\r\n","",$data[":phone"]);
            }else{
                $data[":phone"]="";
                $data[':err']++;
            }
            // 联系人
            $patt = "/xingming'\)\">(.*)<\/a>/Us";
            $a = preg_match($patt,$house_info,$result);
            if($a){
                $data[":lianxi"] = str_replace(" ","",$result[1]);
                $data[":lianxi"] = str_replace("\r\n","",$data[":lianxi"]);
            }else{
                $data[":lianxi"]="";
                $data[':err']++;
            }
            // 房屋配置
            $patt = "/house-disposal\">.*<\/i>(.*)<\/li>.*<\/ul>/Us";
            $a = preg_match_all($patt,$house_info,$result);
            // var_dump($result[0]);
            
            if($a){
                $patt = "/<\/i>(.*)<\/li>/Us";
                $a = preg_match_all($patt,$result[0][0],$arr);
                // var_dump($arr[1]);
                $data[":fwpz"] = str_replace(" ","",implode('-',$arr[1]));
                $data[":fwpz"] = str_replace("\r\n","",$data[":fwpz"]);
            }else {
                //
                $data[":fwpz"]="";
                $data[':err']++;
            }

        return $data;


    }












?>