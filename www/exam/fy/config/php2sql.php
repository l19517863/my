<?php


function pdo_link($servername = "localhost" ,$username ="root" ,$password = "123qwe",$dbname = "bookdb"){


        try{
			$pdo= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); // 创建数据库对象
			//echo "{$dbname}数据库连接成功"."<br>";
			$exec_info = $pdo->exec("set names utf8"); // 发送 编码 指令
            //var_dump($exec_info);
            return $pdo; //返回 一个 PDO 对象
			
		}catch(PDOException $e){

			echo "{$dbname}连接失败".$e->getMessage()."<br>";
        	exit();


		}
}
    //$pdo=pdo_link();
function pdo_insert($pdo,$tb='books',$bookname='null',$zuozhe=null,$press=null,$price='null',$count=1){

            $sql = "insert into {$tb} values(null,'{$bookname}','{$zuozhe}','{$press}',{$price},{$count},now()) ";
			//echo $sql;
			$num = $pdo->exec($sql);// 发送  指令
			if($num!=false){
				echo "插入数据到表{$tb}成功，影响{$num}"."最后主键ID为".$pdo->lastInsertId(); // 返回第一个 插入 的  主键 id 
			}
			else{
					echo "插入数据失败，影响{$num}"."最后主键ID为".$pdo->lastInsertId();
					//var_dump($num);
			}

}
	// 临时 百家号
function pdo_update($pdo,$tb='books',$bookname='null',$zuozhe=null,$press=null,$price='null',$count=1){

            $sql = " update {$tb} set bookname='{$bookname}',author='{$zuozhe}',press='{$press}',price={$price},booknum={$count} where id={$_GET['id']} ; ";
			echo $sql;
			$num = $pdo->exec($sql);// 发送  指令
			if($num!=false){
				echo "插入数据到表{$tb}成功，影响{$num}"."最后主键ID为".$pdo->lastInsertId(); // 返回第一个 插入 的  主键 id 
			}
			else{
					echo "插入数据失败，影响{$num}"."最后主键ID为".$pdo->lastInsertId();
					//var_dump($num);
			}
}


function pdo_use($pdo,$database){
     $sql = "use {$database} ";
    $num = $pdo->exec($sql);
    // var_dump($sql);
    // var_dump($num);


}

//pdo_insert($pdo);

	//表单 name , 允许类型 ， 保存路劲 默认 upload  是否 多文件 ，是否 保存为 随机名
function upfiles($post_name,$allow_type,$savedir="upload/",$ismany=0,$israndname=0){

	var_dump($_FILES[$post_name]);
	$aa=$_FILES[$post_name];//
	//$allow_type=array('jpeg','jpg','gif','png','bmp');// 添加 允许的  后缀
	//$savedir="upload/";// 存储的目录

	
		// 判断 单文件 还是 多文件
	if(!$ismany){
		echo "ismany flase";
		$filetype = pathinfo($aa['name'],PATHINFO_EXTENSION);	// 获取文件类型
		$filename = pathinfo($aa['name'],PATHINFO_FILENAME);		// 获取文件名
		
		if($aa['error']==0){
				// 获取后缀名
				//$lttype = pathinfo($fileArr['name'][$key],PATHINFO_EXTENSION);
				$filetype = pathinfo($aa['name'],PATHINFO_EXTENSION); // 文件类型
				$filename = pathinfo($aa['name'],PATHINFO_FILENAME); //文件名
				if(!$israndname){
					$filename = uniqid();
				}
				//print($lttype);
				if(in_array($filetype,$allow_type)){
						
					if(!file_exists($savedir)){
						mkdir($savedir);
						//判断目录 是否存在 不存在 创建 目录;
					}
					
						//.uniqid() 
					if(move_uploaded_file($aa["tmp_name"],$savedir.$filename.".".$filetype)){
						
						echo "上传成功:".$aa['error']."<br>";
						return $savedir.$filename.".".$filetype; // 返回 一个 文件名
					}
				
				}

			}
			else {
				echo "文件"."上传错误:".$aa['error']."<br>";
			}


	}else{


		  foreach ($aa['error'] as $key => $value) {
			if($value==0){
				// 获取后缀名
				//$lttype = pathinfo($fileArr['name'][$key],PATHINFO_EXTENSION);
				$filetype = pathinfo($aa['name'][$key],PATHINFO_EXTENSION);
				$filename = pathinfo($aa['name'][$key],PATHINFO_FILENAME);
				//print($lttype);
				if(in_array($filetype,$allow_type)){
						
					if(!file_exists($savedir)){
						mkdir($savedir);
						//判断目录 是否存在 不存在 创建 目录;
					}
					
						//.uniqid() 
					if(move_uploaded_file($aa["tmp_name"][$key],$savedir.$filename.".".$filetype)){
						echo "第".($key+1)."文件"."上传成功:".$value."<br>";
					}
				}
			}
			else{
				echo "第".($key+1)."文件"."上传错误:".$value."<br>";
			}
		}
	}
}







?>