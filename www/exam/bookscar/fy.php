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
	include_once './config/php2sql.php';
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
		
		$delpage=3; // 每页 记录数
        $p= isset($_GET['p']) ? $_GET['p'] :1 ;
        
        
        $date1=$pdo->query("select * from books"); // 查询 总 记录数
        echo $date1->rowCount()."...".$date1->rowCount() / $delpage;
        $pages = ceil($date1->rowCount() / $delpage); // 总共 分页   

            $sql = "select * from books limit ".(($p-1)*$delpage).",{$delpage}"; //  单前页 的记录
            $date=$pdo->query($sql); // 查询 总 记录数
        if($date!=false){

            echo "行数".$date->rowCount();
            echo "列数".$date->columnCount(); 
            
           
           // $aa=$date->fetch(PDO::FETCH_ASSOC); // 返回一条记录 的 混合数组， 自动偏移指针
            $bb=$date->fetchAll(); // 返回全部记录 的 默认混合数组， 自动偏移指针  PDO::FETCH_ASSOC
			//var_dump($bb);
            foreach ($bb as $row => $info) { ?>
					
             <tr>
			<td><?php echo $info[0]?></td>
			<td><?php echo $info[1]?></td>
			<td><?php echo $info[2]?></td>
			<td><?php echo $info[3]?></td>
			<td><?php echo $info[4]?></td>
			<td><?php echo $info[5]?></td>
			<td><?php echo $info[6]?></td>
			<td><a href="editbook.php?id=<?php echo $info[0]?>">编辑</a>|<a href="#" onclick="delete1(<?php  echo $info[0]; ?>)">删除</a><a onclick="ajaxAddCar(<?php  echo $info[0]; ?>,1)" href="javascript:;">| 添加</a><a onclick="ajaxAddCar(<?php  echo $info[0]; ?>,2)" href="javascript:;">| 增加</a><a onclick="ajaxAddCar(<?php  echo $info[0]; ?>,3)" href="javascript:;">| 减少</a><a onclick="ajaxAddCar(<?php  echo $info[0]; ?>,4)" href="javascript:;">| 删除</a></td>
			</tr>
				
		 
		 <?php   
            
            }   
        }
?>

<tr><td colspan="8">
        <?php
    
        for($i=1;$i<=$pages;$i++){?> 
          
           <a href='fy.php?p=<?php echo $i;?>'><?php echo $i;?></a>";
         
         <?php
        }
    ?>
                </td></tr>
	</table>
	<table>
		<caption><h2>购物车</h2></caption>
		<tr>
			<th>编号</th>
			<th>书名</th>
			<th>作者</th>
			<th>出版社</th>
			<th>价格</th>
			<th>数量</th>
			<th>总价</th>
			<th>操作</th>
		</tr>
		<tbody id="car">

		</tbody>

	</table>
</body>
</html>
<script src="./js/jquery-3.2.1.min.js"></script>
<script>
	$(function(){


		ajaxAddCar(0,0);// load 加载 购物车




	});
		function ajaxAddCar(id,ac){
			$.ajax({
              type: "POST",
			  url: "./session.php",
			  dataType:"json",
			  data:{'bookid':id,'action':ac} , // 1:添加书 2:增加数量 3:减少数量 4:删除书
			  // 序列化表单值  ('#new_user').serializeArray()
              async: true,
              error: function (request) {
                alert("Connection error");
              },
              success: function (data) {
				// window.location.href = "跳转页面"
				if (data!=null) {
					var str="";

						for (const key in data) {
							if (data.hasOwnProperty(key)) {
								const value = data[key];
								
									str+="<tr>"+
									"<td>"+key+"</td>"+
									"<td>"+value['bookname']+"</td>"+
									"<td>"+value['author']+"</td>"+
									"<td>"+value['press']+"</td>"+
									"<td>"+value['price']+"</td>"+
									"<td>"+value['count']+"</td>"+
									"<td>"+(value['price']*value['count']).toFixed(2)+"</td>"+
									"<td>"+
									"<a onclick="+"ajaxAddCar("+key+",2)"+" href='javascript:;'>| 增加</a>"+
									"<a onclick="+"ajaxAddCar("+key+",3)"+" href='javascript:;'>| 减少</a>"+
									"<a onclick="+"ajaxAddCar("+key+",4)"+" href='javascript:;'>| 删除</a>"+
									"</td>"+
								"</tr>";

								console.log(key);
								console.log(value);
							}
						}
						
					}


					// alert(data);
				$("#car").html(str);
				
			}
				
              
            });




		}



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