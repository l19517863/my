<?php
require_once "../../class/Loader.class.php"; // 包含自动加载类  必须用 require 否则 不执行
// header("Content-type:image/png");
Loader::$LoaderDir= "../../class/";
spl_autoload_register("Loader::GD_");
spl_autoload_register("Loader::upfile_");
spl_autoload_register("Loader::__autoload");


    $allow_type=array('jpeg','jpg','gif','png');// 添加 允许的  后缀
    $month = date("M");;
    $day = date("d");
    $savedir="../static/upload/";// 存储的目录

    if($_POST['flag']==1){
        // var_dump($_FILES);
        // 表单name:string , 允许类型array[]:string ， 保存路径string / 是否多图片bool ，是否随机名bool，是否覆盖同名图片bool/ 是否添加水印bool,水印图path:string,水印图是否覆盖原图       
        var_dump(Uploader::upPicPW('img1',$allow_type,$savedir,false,0,1,true,'../static/image/C_150.png',true));
    }
    else {
        var_dump( Uploader::upPicPW('img2',$allow_type,$savedir,true,0,0,true,'../static/image/C_150.png',true));
    }







?>
