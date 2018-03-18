<?php


if(isset($_GET['uname'])){
    if($_GET['uname']=='admin'){
        echo "存在用户名";
 }else {
        echo "不存在用户名";
    }
}else {
    echo "uname 未传入";
}