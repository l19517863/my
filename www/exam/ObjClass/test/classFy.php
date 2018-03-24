<?php
require_once "../class/Loader.class.php";
Loader::$LoaderDir= "../class/";
spl_autoload_register("Loader::UI_");
spl_autoload_register("Loader::__autoload");

$pdo = mysqlonce::getobj("localhost","root","123qwe","58db");
 // 配置
    $perCount = 3; 
    var_dump( $infoCount = $pdo->findOne("select count(*) count from houses_info")['count']);
    // $infoCount = 123;
    $pageCount = ceil($infoCount/$perCount);

    $p = (isset($_GET["p"]) && $_GET["p"]>0 && $_GET["p"]<=$pageCount)? $_GET["p"] : 1;

// 配置 获取数据
    $sql_like = " ";
    $sql_where = " where 1 {$sql_like}";
    $sql_limit = " limit ".($p-1)*$perCount.",$perCount";

        // 获取数据
    $sql = "select * from houses_info {$sql_limit}";
    var_dump($arr = $pdo->findAll($sql));
        // 输出 分页
    echo page::makePages($pageCount,$p);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>class分页</title>
    <link rel="stylesheet" href="">
</head>
<body>
    











</body>
</html>