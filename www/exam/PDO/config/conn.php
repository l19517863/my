<?php
define("HOST","localhost");
define("PORT","3306");
define("DBNAME","bookdb");
define("USER","root");
define("PWD","123qwe");//你的
try{
    $dsn = "mysql:host=".HOST.";dbname=".DBNAME;
    $pdo = new PDO($dsn,USER,PWD);
    // exec 增伤该
    // query 查
    $pdo->exec("set names utf8"); // 设置编码
}catch(PDOException $e){
    echo "数据库连接错误".$e->getMessage();
}











?>