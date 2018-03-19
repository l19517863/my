<?php
include_once "./upfiles&w.php";

if(isset($_POST['flag'])){
    // var_dump($_POST);
    $allow_type=array('jpeg','jpg');// 添加 允许的  后缀
    $dir = date("Ymd");;
    $savedir="../upload/{$dir}/";// 存储的目录
    if($_POST['flag']==1){
        // var_dump($_FILES);
        // 表单name:string , 允许类型array[]:string ， 保存路径string  是否多图片bool ，是否随机名bool，是否覆盖同名图片bool 是否添加水印bool,水印图是否覆盖原图,水印图path:string       
        var_dump(upPicPW('img1',$allow_type,$savedir));

    }
    
}else {
    echo "未提交";
}




?>