<?php
include_once "./upfiles&w.php";

if(isset($_POST['flag'])){
    // var_dump($_POST);
    $allow_type=array('jpeg','jpg','gif','png','bmp');// 添加 允许的  后缀
    $savedir="upload/";// 存储的目录
    if($_POST['flag']==1){
        var_dump($_FILES);
        // 表单name:string , 允许类型array[]:string ， 保存路径string  是否多图片bool ，是否随机名bool，是否覆盖同名图片bool 是否添加水印bool 水印图path:string       
        upPicPW('img1',$allow_type,$savedir,0,0,0,true,'../images/logo.png');

    }
    else {
        // upPicPW('img2',$allow_type,$savedir,true);
    }
    



}else {
    echo "未提交";
}




?>