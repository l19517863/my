<?php
require_once "../class/Loader.class.php"; // 包含自动加载类  必须用 require 否则 不执行
Loader::$LoaderDir= "../class/";
spl_autoload_register("Loader::Exc_");
spl_autoload_register("Loader::__autoload");


function test($n=1){

        throw new GetError("Error Processing Request",1);
    
}



// new \Exception([‘错误信息’，错误编号，上一个错误对象]);
try{// 接收 被 抛出 对象

$e =new \Exception("测试错误",123); // 处理错误信息 的 对象
// throw $e; // 抛出 对象

test();


}catch(Exception $e){
    // 执行 处理 对象
echo "出错文件:&nbsp".$e->getFile()."<hr>";
echo "错误信息:&nbsp".$e->getMessage()."<hr>";
echo "错误编号:&nbsp".$e->getCode()."<hr>";
echo "错误行号:&nbsp".$e->getLine()."<hr>";

}


echo "<br>";
echo "<br>";

try{

    throw new GetError("错误",1);
    
}catch(GetError $e){
    // 自定义 对象 必须 继承 \Exception

echo "出错文件:&nbsp".$e->getF()."<hr>";
echo "错误信息:&nbsp".$e->getM()."<hr>";
echo "错误编号:&nbsp".$e->getC()."<hr>";
echo "错误行号:&nbsp".$e->getL()."<hr>";




}finally{

    echo "这里的代码无论有没有抛出异常,都会执行<hr>";

}
















?>