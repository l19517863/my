<?php

require_once "./class/Loader.class.php"; // 包含自动加载类  必须用 require 否则 不执行

spl_autoload_register("Loader::robot");
spl_autoload_register("Loader::final_");
spl_autoload_register("Loader::abstruct_");
spl_autoload_register("Loader::__autoload");


$robot1 = new robot();
$robot1= new robot();
$robot2= new robot();
$robot3 = new ROBOT();// 类名不区分 大小写
$car1 = new car();
$car2 = new car();


echo $robot1->clean();
echo $robot2->clean();
// var_dump($car1,$car2);
$robot1->tobind($car1);

// var_dump($car1,$car2);
$robot1->calc(2,3);
$car1->move();
$car2->move();
$robot2->tobind($car1);
// echo robot::$rCount;
echo $robot1->name."<br>";

$man1 = new man();

$man1 -> eat();

// $man1 = new man();
// var_dump($man1);
$sman1 = new surperman();
$sman1->fly();

$sman1 -> eat();
// echo $r2->name;

$oman = new oldman();

$Man2 = new Man2();





?>