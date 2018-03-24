<?php

require_once "./class/Loader.class.php"; // 包含自动加载类  必须用 require 否则 不执行
Loader::$LoaderDir= "./class/";

spl_autoload_register("Loader::other_");
spl_autoload_register("Loader::tem1_");
spl_autoload_register("Loader::tem2_");
spl_autoload_register("Loader::math_");
spl_autoload_register("Loader::final_");
spl_autoload_register("Loader::abstruct_");
spl_autoload_register("Loader::implements_"); //接口
spl_autoload_register("Loader::__autoload");

//机器 与汽车 类
$robot1 = new robot();
echo "ROBOT数量".robot::$rCount."<br>";
$robot1= new robot();
echo "ROBOT数量".robot::$rCount."<br>";
$robot2= new robot();
var_dump($robot2);
echo "ROBOT数量".robot::$rCount."<br>";
$robot3 = new ROBOT();// 类名不区分 大小写
echo "ROBOT数量".robot::$rCount."<br>";
$car1 = new car();
$car2 = new car();

$robot2= new robot();
var_dump($robot2);

echo $robot1->clean();
echo $robot2->clean();
// var_dump($car1,$car2);
$robot1->tobind($car1);

// var_dump($car1,$car2);
$robot1->calc(2,3);
$car1->move();
$car2->move();
// 权限 拓展
$robot2->tobind($car1);
// echo robot::$rCount;
// 手动 传址
echo $robot1->name."<br>";

   $name1 = $robot1->name; // 值传递
   $name1 = "大明";
   echo $robot1->name."<br>";

$name=&$robot1->name; 
$name = "小明";
echo "ROBOT数量".robot::$rCount."<br>";
echo $robot1->name."<br>";

$r1 = $robot1; // 对象 默认 传址  
var_dump($r1,$robot1);

$a =  clone($robot1);
var_dump($a);
     // 怎么 在 克隆 重新 赋值
var_dump($robot1);
    // 克隆 不执行 构造方法 调用 克隆 方法
echo "ROBOT数量".robot::$rCount."<br>";
unset($a);
echo "ROBOT数量".robot::$rCount."<br>";



    // 普通类 普通人
$man1 = new man();
$man1 -> eat();
// 继承类 超人 继承 普通人
$sman1 = new Surperman();
$sman1->fly();
$sman1 -> eat();
    // 最终 类
$oman = new oldMan();
    // 最终类 继承 普通人 
$Man2 = new Man2();

    // 抽象类
$dog1 = new dog();
$man1->toBind_Dog($dog1);
var_dump( $dog1->master());
$dog2 = new dog();
$dog2->master();

$pdo = new MySql("localhost","root","123qwe","58db");
$pdo2 = mysqlonce::getobj("localhost","root","123qwe","58db");
var_dump($pdo,$pdo2);
$sql = "select title from houses_info limit 5";
var_dump($pdo->findFirstColumn($sql));
var_dump($pdo2->findOne($sql));

echo circle::PI."<br>";

// 魔术变量
$iman1 =new iman();
$iman1->show();
var_dump($iman1);
$iman1->age  = 1;
$iman1->age;
var_dump($iman1);
iman::a(2,3);
// image::upPicPW();

// 命名空间
// 默认的 使用 全局 tem 类 头部无命名空间的 so 找不到
use \tem1_\tem; //设置为全局 
use \tem1_\tem as tem1; // 别名
use \tem2_\tem as tem2;
// @$tem1 = new tem();
$tem1 = new tem(); // use 定义了 全局 下 的 tem 空间
$tem11 = new \tem1_\tem();
$tem21 = new \tem2_\tem();
echo "使用别名<br>";
$tem12 = new tem1;
$tem22 = new tem2;

?>

