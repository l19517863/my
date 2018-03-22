<style>
	.pagelist {
		color: #666;
	}

	.pagelist a{

		display: block;
		float: left;
		margin-right: 5px;
		font-size: 14px;
		color: #333;
		height: 36px;
		line-height: 36px;
		text-decoration: none;
		border: 1px solid #ddd;
		background: #f7f7f7;
		padding: 0 14px;
	}
	.pagelist span,input {
		font-size: 14px;
		display: block;
		color: #333;
		float: left;
		height: 36px;
		line-height: 36px;
	}
	.pagelist .num {
		text-align: center;

	}
</style>
<?php 
	require_once "MySQLDB.class.php";
	require_once "Page.class.php";

	$pdo = new MySQLDB('127.0.0.1','root','123','housedb','utf8');
	$count = $pdo->getFirstField('SELECT COUNT(*) FROM house_info');
	// 使用Page类制作翻页
	$page = Page::makePage($count);
	$data = $pdo->findAll('SELECT * FROM house_info LIMIT '.$page['limit']);

	// 输出数据
	foreach($data as $v)
	{
		echo $v['title'].'<hr>';
	}

	// 显示翻页
	echo $page['pageStr'];


 ?>