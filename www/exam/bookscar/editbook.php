<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑图书</title>
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
	include_once '../php/php2sql.php';
	$pdo=pdo_link();
?>
<body>
	
	<a href="index1.php">图书列表</a> 
	<hr>
	<table>
		<caption><h2>修改图书</h2></caption>

		<?php


        $sql = "select * from books where id={$_GET['id']}";
        $date=$pdo->query($sql); // 专门 查询 返回到 PDOStatement 查询到的信息 对象，返回 记录数 $sum
        if($date!=false){

            echo "行数".$date->rowCount();
            echo "列数".$date->columnCount(); 

           // $aa=$date->fetch(PDO::FETCH_ASSOC); // 返回一条记录 的 混合数组， 自动偏移指针
            $bb=$date->fetch(); // 返回全部记录 的 默认混合数组， 自动偏移指针  PDO::FETCH_ASSOC
			//var_dump($bb);
             ?>
		<form action="update.php?id=<?php echo $_GET['id'];?>" method="post">
		<tr>
			<td class="input-title">图书名称:</td>
			<td><input type="text" class="input-txt" name="bookname" value="<?php echo $bb[1]?>"></td>	
		</tr>

		<tr>
			<td class="input-title">图书作者:</td>
			<td><input type="text" class="input-txt" name="zuozhe" value="<?php echo $bb[2]?>"></td>	
		</tr>
		<tr>
			<td class="input-title">出版社:</td>
			<td><input type="text" class="input-txt" name="press" value="<?php echo $bb[3]?>"></td>	
		</tr>
		<tr>
			<td class="input-title">价格:</td>
			<td><input type="text" class="input-txt" name="price" value="<?php echo $bb[4]?>"></td>	
		</tr>
		<tr>
			<td class="input-title">数量:</td>
			<td><input type="text" class="input-txt" name="count" value="<?php echo $bb[5]?>"></td>	
			<input type="hidden" name="flag" value="<?php echo $_GET['id'];?>">
		</tr>
			
						 <?php   
        }
?>


		<tr>
			<td class="input-title" colspan="2" style="text-align: center;">
				<input type="submit" value="确认修改">
				<input type="reset" value="取消">
			</td>
			</form>
		</tr>
	</table>
</body>
</html>