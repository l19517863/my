<?php

	require_once "config.php";
	$pdo = null;
	try{
		$dsn = "mysql:host=".HOST.";dbname=".DBNAME;
		//echo $dsn;
		$pdo = new PDO($dsn,USER,PWD);

		$num = $pdo->exec("set names utf8");
			// 抛出 异常
		// $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			// 默认 提取模式
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		//echo $num.'--------------------------';
		// echo "连接成功";
	}catch(PDOException $e){
		echo "数据库连接失败！".$e->getMessage();
		exit();
	}

?>