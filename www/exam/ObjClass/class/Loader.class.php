<?php



class Loader{
        // 在 robot 寻找类
    public static function robot($class){
        echo "正在自动加载类robot:{$class}<br>";
        @include "class/robot/".$class.".class.php"; // 在下一个 自动加载类中 继续找 不需要报错
        // include_once
    }
        // 加载 最终类
    public static function final_($class){
        echo "正在自动加载类final:{$class}<br>";
        @include "class/final/".$class.".class.php";
        // include_once
    }
        // 加载 抽象类 
    public static function abstruct_($class){
        echo "正在自动加载类abstruct:{$class}<br>";
        @include "class/abstruct/".$class.".class.php";
        // include_once
    }
        // 原始 加载类
    public static function __autoload($class){
        echo "正在自动加载类__autoload:{$class}<br>";
        include_once "class/".$class.".class.php"; //不加 抑制符  报错说明 到最后 都找不到 正确的类   require_once
    }

}

/*

    include "";  不区分 大小写
    
    自动加载  要 把  每一个类 都 单独一个 文件



 */



?>