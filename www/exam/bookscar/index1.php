<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>图书管理系统</title>
	<style>
		table {
			font-size: 16px;
			color: #666;
			width: 1200px;
			margin: 0px auto;
			text-align: center;
			border-collapse: collapse;
		}

		th,td {
			border: 1px solid #999;
		}

		tr:nth-child(even) {
			background-color: #FFFFCC;
		}
	</style>
</head>
<?php
	include_once '../php/php2sql.php';
	$pdo=pdo_link();
?>
<body>
	<a href="addbook.php">添加图书</a> 
	<hr>
	<table>
		<caption><h2>图书管理系统</h2></caption>
		<tr>
			<th>编号</th>
			<th>书名</th>
			<th>作者</th>
			<th>出版社</th>
			<th>价格</th>
			<th>数量</th>
			<th>时间</th>
			<th>操作</th>
		</tr>
		
		
		<?php


        $sql = "select * from books";
        $date=$pdo->query($sql); // 专门 查询 返回到 PDOStatement 查询到的信息 对象，返回 记录数 $sum
        if($date!=false){

            echo "行数".$date->rowCount();
            echo "列数".$date->columnCount(); 

           // $aa=$date->fetch(PDO::FETCH_ASSOC); // 返回一条记录 的 混合数组， 自动偏移指针
            $bb=$date->fetchAll(); // 返回全部记录 的 默认混合数组， 自动偏移指针  PDO::FETCH_ASSOC
			
            foreach ($bb as $row => $info) { ?>
					
             <tr>
			<td><?php echo $info[0]?></td>
			<td><?php echo $info[1]?></td>
			<td><?php echo $info[2]?></td>
			<td><?php echo $info[3]?></td>
			<td><?php echo $info[4]?></td>
			<td><?php echo $info[5]?></td>
			<td><?php echo $info[6]?></td>
			<td><a href="editbook.php?id=<?php echo $info[0]?>">编辑</a>|<a href="#" onclick="delete1(<?php  echo $info[0]; ?>)">删除</a></td>
			</tr>
				
		 
		 <?php   
            
            }   
        }
?>
	
	</table>
</body>
</html>
<script>

		function delete1(id1){
				//alert("dd");
			if(confirm('确定删除吗')){

				location.href='delete1.php?id='+id1;


			}
			else{
				alert("ss");
			}


		}



</script>