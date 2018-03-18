<?php
/*
 * 定义函数用来根据客户端传来的id值进行查询
 * 查询条件：parent_id = 客户端传递过来的id值
 * 参数：$dbh  数据库连接对象 	$pid 客户端传递过来的id值
 */
function findAllByParentId($dbh,$pid){
	
	//定义sql
	$sql = "select id,parent_id,name from city where parent_id = :pid";
	//预处理sql语句
	$query = $dbh->prepare($sql);
	//传入参数、执行查询
	$query->execute(array(":pid"=>$pid));
	//设置结果集返回方式为 关联数组
	$query->setFetchMode(PDO::FETCH_ASSOC);	
	//返回关联数组
	return  $query->fetchAll();
	
}
?>