<?php
include_once "../config/conn.php";



    $delpage=5; // 每页 记录数
    $p= isset($_POST['p']) ? $_POST['p'] :1 ;
        $keyw='';// 默认关键字 为 空
        $like='';
    if($_POST['keyword']!=''){
        $keyw=$_POST['keyword'];//设置 搜索 关键字
        $like = " and ((title like '%{$keyw}%') or (`desc` like '%{$keyw}%')) ";

        $sql = "select * from house_info where 1 ".$like;
        $data = $pdo->query($sql);
        $count = $data->rowCount();// 总 记录数

    }else{

        $data = $pdo->query('select * from house_info');
        $count = $data->rowCount();// 总 记录数
    }
    
    


    $sql = "select * from house_info where 1 ".$like."limit ".(($p-1)*$delpage).",{$delpage}";
    // echo $sql;
    $data = $pdo->query($sql);
    $pages = ceil($count / $delpage); // 总共 分页
    // echo $pages;
    if($data!=false){
        $info = $data->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($info);
?>
<!-- <script src="./js/jquery-3.2.1.min.js"></script> -->
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
            width: 292px;
            overflow: hidden;
            white-space: nowrap;
            display: inline-block;
        }

        tr:nth-child(even) {
            background-color: #FFFFCC;
        }
    </style>
        <script>
        $(function(){

			$("#searchbtn").click(function(){
					searchAndfy(1,$("#keyword").val());
			})
	});
        function searchAndfy(p,keyword){
			$.ajax({
              type: "POST",
			  url: "./php/get.php",
			  data:{'p':p,'keyword':keyword} , // p 页码 keyword 搜索关键字
			  // 序列化表单值  ('#new_user').serializeArray()
              async: true,
              error: function (request) {
                alert("Connection error");
              },
              success: function (data) {
                        $("body").html(data);
				
			    }
				
            });

		}
        
    </script>
    <table>
            <caption><input type="text" id="keyword" value='<?php echo $_POST['keyword']?>'> <input id="searchbtn" type="button" value="搜索"><h2>house_info</h2></caption>
            <tr>
                <th>编号</th>
                <th>标题</th>
                <th>价格</th>
                <th>描述</th>
            </tr>

 <?php       
        foreach ($info as $key => $value) {
?>
            
            <tr>
			<th><?php echo $value['id']?></th>
			<th><?php echo $value['title']?></th>
			<th><?php echo $value['price']?></th>
			<th><?php echo $value['desc']?></th>
        </tr>



<?php
        }
?>
    </table>

        <!-- page -->
<?php 
        echo "总共".$p."/".$pages;
        if($p!=1){
            

?>
            
            <a class="pagePre" onclick="searchAndfy(<?php if($p>=2)echo $p-1;else echo $p;?>,'<?php echo $keyw;?>')"><i class="ico-pre">上一页</i></a>
<?php 
        }
?>

<?php
            $pmax=4;// 显示页数    总页数 $pages
            $leftp=2;
            $rightp=2;
            $p1=$p-$leftp>0? $p-$leftp: 1;
            $p2=$p+  $rightp<$pages ? $p+  $rightp : $pages;

            for($i=$p1;$i<=$p2;$i++){
?> 

            <a  class="pagenumb <?php if($p==$i)echo 'cur'?>" onclick="searchAndfy(<?php echo $i;?>,'<?php echo $keyw;?>')" ><?php echo $i;?></a>
<?php
}
?>

<?php if($p!=$pages){?>
<a onclick="searchAndfy(<?php if($p<$pages)echo $p+1; else echo $p;?>,'<?php echo $keyw;?>')" class="pagenext"><i class="ico-next">下一页</i></a>


<?php }?>
    <!-- page -->


    
<?php
    }
    // var_dump($result);
// echo json_encode($result);





