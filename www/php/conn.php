<?php

	require_once "config.php";
	$pdo = null;
	try{
		$dsn = "mysql:host=".HOST.";dbname=".DBNAME;
		//echo $dsn;
		$pdo = new PDO($dsn,USER,PWD);

		$num = $pdo->exec("set names utf8");
		//echo $num.'--------------------------';
		//echo "连接成功";
	}catch(PDOException $e){
		echo "数据库连接失败！".$e->getMessage();
		exit();
	}

?>