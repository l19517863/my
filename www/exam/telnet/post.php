<?php
$str = "aaa";
$str2 = "bbb";
if(isset($_POST['name'])){
    if($_POST['name']=='lhz'){
        echo $str;
    }
    
    else {
        echo $str2;
    }
}
?>