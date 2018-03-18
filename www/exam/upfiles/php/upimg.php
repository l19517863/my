<?php
include_once "./my_function1.php";

if(isset($_POST['flag'])){
    var_dump($_POST);
	$allow_type=array('jpeg','jpg','gif','png','bmp');// 添加 允许的  后缀
	$savedir="upload/";// 存储的目录
    upfiles('img1',$allow_type,$savedir);
    upfiles('img2',$allow_type,$savedir,1);



}else {
    echo "未提交";
}




?>