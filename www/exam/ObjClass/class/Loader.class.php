<?php

class Loader{
    public static $LoaderDir = "class/";

    public static function other_($className){
        $path = self::$LoaderDir.__FUNCTION__."/".$className.".class.php";
        if(file_exists($path)){
            include_once $path; // 在下一个 自动加载类中 继续找 不需要报错
            echo "正在自动加载类".__FUNCTION__.":{$className}<br>";
        }
    }
        // 在 math 寻找类
    public static function math_($className){
        $path = self::$LoaderDir.__FUNCTION__."/".$className.".class.php";
        if(file_exists($path)){
            include_once $path;
            echo "正在自动加载类".__FUNCTION__.":{$className}<br>";
        }
    }
        // 在 upfile_ 寻找类
    public static function upfile_($className){
        $path = self::$LoaderDir.__FUNCTION__."/".$className.".class.php";
        if(file_exists($path)){
            include_once $path;
            echo "正在自动加载类".__FUNCTION__.":{$className}<br>";
        }
    }
        // 在 GD 寻找类
    public static function GD_($className){
        $path = self::$LoaderDir.__FUNCTION__."/".$className.".class.php";
        if(file_exists($path)){
            include_once $path;
            echo "正在自动加载类".__FUNCTION__.":{$className}<br>";
        }
    }
        // 在 UI 寻找类
    public static function UI_($className){
        $path = self::$LoaderDir.__FUNCTION__."/".$className.".class.php";
        if(file_exists($path)){
            include_once $path;
            echo "正在自动加载类".__FUNCTION__.":{$className}<br>";
        }
    }
        // 加载 最终类  final 是关键字 
    public static function final_($className){
        $path = self::$LoaderDir.__FUNCTION__."/".$className.".class.php";
        if(file_exists($path)){
            include_once $path;
            echo "正在自动加载类".__FUNCTION__.":{$className}<br>";
        }
    }
        // 加载 抽象类 
    public static function abstruct_($className){
        $path = self::$LoaderDir.__FUNCTION__."/".$className.".class.php";
        if(file_exists($path)){
            include_once $path;
            echo "正在自动加载类".__FUNCTION__.":{$className}<br>";
        }
    }
        // 原始 根目录 加载类
    public static function __autoload($className){
        $path = self::$LoaderDir.$className.".class.php";
        if(file_exists($path)){
            echo "正在自动加载类".__FUNCTION__.":{$className}<br>";
            include_once $path; //不加 抑制符  报错说明 到最后 都找不到 正确的类   require_once
        }else{
            echo "未找到{$className}类<br>";
        }
    }
// 加载类结束
}
?>
<?php

/*

require_once "./class/Loader.class.php"; // 包含自动加载类  必须用 require 否则 不执行
Loader::$LoaderDir= "./class/";
spl_autoload_register("Loader::__autoload");
spl_autoload_register("Loader::othert_");
spl_autoload_register("Loader::math_");
spl_autoload_register("Loader::final_");
spl_autoload_register("Loader::abstruct_");
spl_autoload_register("Loader::upfile_");
spl_autoload_register("Loader::GD_");

*/

/*
    include "";  不区分 大小写
    自动加载  要 把  每一个类 都 单独一个 文件
 */

/*
    静态 方法
    与 成员 方法 都 存在 类区

    可以 通过 类 调用 成员 方法  但是 会 警告
    类 直接掉用 静态 方法
*/
?>

