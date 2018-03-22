<!-- <link rel="stylesheet" href=""> -->
<style>



    
</style>
<?php


class page{

    public static function makePages($pageCount,$p,$class=''){
            //  不 GET p 在 传第的参数 p  已过滤 非法 数值
         $get_=$_GET;
         if(isset($get_['p']))
            unset($get_['p']);

        $GetStrNp = "?";
        foreach ($get_ as $key => $value) {
            $GetStrNp.=$key.'='.$value.'&';
        }
        // $GetStrNp .= "&";
        
        // 配置
            $pmax=5;// 最少显示页数 最好单数页 - 1 左右/2  总页数 $pageCount
            $leftp=2; // 当前页 左边显示 页数
            $rightp=2;// 当前页 右边显示 页数
            $p1=$p-$leftp>0? $p-$leftp: 1;
            $p2=$p+  $rightp<$pageCount ? $p+  $rightp : $pageCount;
            echo $pmax."<br>";
            echo $p2-$p1."<br>";
            echo $pageCount-$p."<br>";
            while($p2-$p<$pageCount-$p && $p2-$p1<$pmax-1){
                    $p2++;
            }
            while($p-$p1>0 && $p2-$p1<$pmax-1){
                    $p1--;
            }


        $aStr = " <a class=\"\" href=".$GetStrNp."p=1>首页</a>";
        $aStr .= " <a class=\"\" href=".$GetStrNp."p=".(($p-1)? $p-1:1).">上一页</a>";
        for($i=$p1;$i<=$p2;$i++){
            if($i==$p)
                $aStr .= " <a class=\"cur\" href=".$GetStrNp."p={$i}".">$i</a>";
            else
                $aStr .= " <a class=\"\" href=".$GetStrNp."p={$i}".">$i</a>";
            
        }
        $aStr .= " <a class=\"\" href=".$GetStrNp."p=".(($p+1)<$pageCount?$p+1:$pageCount).">下一页</a>";
        $aStr .= " <a class=\"\" href=".$GetStrNp."p=".$pageCount.">末页</a>";
        $aStr .= " <input class=\"\" type=\"text\">";
        $aStr .= " <input class=\"\" type=\"button\" value=\"转到\" onclick=\"\">";









        echo "总页数".$pageCount."<br>";
        echo "当前页".$p."<br>";

        return $aStr;

    }




}



?>

<!-- <a href="?">首页</a>
<a href="?">上一页</a>

<a href="javascript:;">...</a>
<a href="?">3</a>
<a href="?">4</a>
<a href="?">5</a>
<a href="javascript:;">...</a>

<a href="?">下一页</a>
<a href="?">末页</a>
<input type="text" onclick=""> -->