<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>测试</title>
	<script src="js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="js/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<script src="js/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="js/my_function.js"></script>
</head>

<body>
<style>
	body{
		color:red;
	}
	</style>

<?php
	include_once "./php/my_function1.php";
	echo 'hello<br>';
	if(isset($_POST['user'])){
		var_dump($_POST);
		$str=implode(',',$_POST['user']['hobby']);
		echo $str;
	}
	
	?>

	<form action="" method="post">

		爱好：<input type="checkbox" name="user[hobby][]" value='抽烟'>抽烟
		<input type="checkbox" name="user[hobby][]" value='喝酒'>喝酒
		<input type="checkbox" name="user[hobby][]" value='烫头'>烫头
		<input type="submit" value="提交">
	</form>
	
	<script>
	
	
	
	</script>
</body>
</html>