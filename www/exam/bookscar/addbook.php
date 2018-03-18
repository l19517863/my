<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加图书</title>
	<style>
		table {
			font-size: 16px;
			color: #666;
			width: 600px;
			margin: 0px auto;
			border-collapse: collapse;
		}
		th,td {
			border: 1px solid #999;
		}
		tr:nth-child(even) {
			background-color: #FFFFCC;
		}

		.input-txt {
			width: 300px;
			height: 25px;
			font-size: 16px;
			color: #666;
		}

		.input-title {
			text-align: right;
			width: 30%;
		}

	</style>
</head>
<?php
	include_once './config/php2sql.php';
	//$pdo=pdo_link();
?>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = "123qwe"; 
$dbname = "bookdb"; // 不马上use  库 则 为空 即可
	if(isset($_POST['flag'])){
		$bookname=null;
		$zuozhe=null;
		$press=null;
		$count=null;
		$price=null;
		$bookname=$_POST['bookname'];
		$zuozhe=$_POST['zuozhe'];
		$press=$_POST['press'];
		$count=$_POST['count'];
		$price=$_POST['price'];

		var_dump($price);
		echo "<br>";
		 echo isset($price);
		 echo "<br>";
		try{
			$mydb_bookdb= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); // 创建数据库对象
			echo "{$dbname}数据库连接成功"."<br>";
			$exec_info = $mydb_bookdb->exec("set names utf8"); // 发送 编码 指令
			var_dump($exec_info);
			
			// $sql = "insert into books values(null,'{$bookname}','{$zuozhe}','{$press}',{$price},{$count},now()) ";
			// echo $sql;
			pdo_insert($mydb_bookdb,'books',$bookname,$zuozhe,$press,$price,$count);



		}catch(PDOException $e){

			echo "{$dbname}连接失败".$e->getMessage()."<br>";
        	exit();


		}

	}

?>
<body>
	
	<a href="index1.php">图书列表</a> 
	<hr>
	<table>
		<caption><h2>添加图书</h2></caption>
		<form action="" method="post">
		<tr>
			<td class="input-title">图书名称:</td>
			<td><input type="text" class="input-txt" name="bookname"></td>	
		</tr>

		<tr>
			<td class="input-title">图书作者:</td>
			<td><input type="text" class="input-txt" name="zuozhe"></td>	
		</tr>
		<tr>
			<td class="input-title">出版社:</td>
			<td><input type="text" class="input-txt" name="press"></td>	
		</tr>
		<tr>
			<td class="input-title">价格:</td>
			<td><input type="text" class="input-txt" name="price"></td>	
		</tr>
		<tr>
			<td class="input-title">数量:</td>
			<td><input type="text" class="input-txt" name="count"></td>	
		</tr>
				<input type="hidden" name="flag" value="1">
		<tr>
			<td class="input-title" colspan="2" style="text-align: center;">
				<input type="submit" value="确认添加">
				<input type="reset" value="取消">
			</td>
			</form>
		</tr>
	</table>
</body>
</html>