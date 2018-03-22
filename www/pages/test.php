<?php 
	require_once "MySQL.class.php";
	//导入分页的类
	require_once "Page.class.php";

	//创建数据库连接的对象
	$db = new MySQL("localhost","root","123","housedb");

	//计算总记录数
	$sql = "select count(*) from house_info";
	$count = $db->getFirstFeild($sql);

	//制作分页
	$pageArr = Page::makePage($count,10);
	//定义sql语句 
	$sql = "select * from house_info ".$pageArr['limit'];
	$resultArr = $db->findAll($sql);

	foreach ($resultArr as $value) {
		echo $value['title']."<hr>";
	}

	//输出页码
	echo $pageArr['pageStr'];

 ?>