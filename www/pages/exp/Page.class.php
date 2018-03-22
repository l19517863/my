<?php 
	//分页类的思路：
	//函数功能：提供总记录数和每页大小，返回分页代码字符串
	//
	
	class Page {

		//生成分页核心代码
		public static function makePage($rowCount,$pageSize=10){

			//1、根据总记录数，计算总页数
			$pages = ceil($rowCount / $pageSize);
			// $pages = 6;
			//2、接收当前页并判断（如果当前页不存在，则设置为1）
			//   $p 保存当前页
			$p = isset($_GET['p'])&&$_GET['p']>0 ? $_GET['p'] : 1;
			//3、判断页数是否大于最后一页
			if($pages>0 && $p>$pages) $p = $pages;
			//4、计算偏移量
			$limit = " ".($p-1)*$pageSize." , ".$pageSize." ";

			//*********** 拼接翻页的字符串 ***********
			$pageStr = "<div class='pagelist'>";

			if($pages>0){

				$oldParams = "";
				//如果$_GET数组不为空
				if(count($_GET)){
					//先把原有的p参数删除
					unset($_GET['p']);
					foreach ($_GET as $key => $value) {
						$oldParams .= $key."=".$value."&";
					}
				}

				//判断是否显示首页和上一页
				if($p!=1){
					$pageStr .= "<a href='?{$oldParams}p=1' class='first'>首页</a>";
					$pageStr .= "<a href='?{$oldParams}p=".($p-1)."' class='prev'>上一页</a>";
				}

				//计算页码
				$start = 1;
				$end = $pages;

				//如果当前页小于等于5页，则只显示到第7页
				if($p<=5){
					//start = 1
					$start = 1;
					//end = 4;
					$end = min(7,$pages);

				}else if($p>=6 && $p<= $pages-3){

					$pageStr .="<a href='?{$oldParams}p=1'>1</a>";
					$pageStr .="<a href='?{$oldParams}p=2'>2</a>";
					$pageStr .="<a>...</a>";
					$start = $p-3;
					$end = $p+2;

				}else {

					$pageStr .="<a href='?{$oldParams}p=1'>1</a>";
					$pageStr .="<a href='?{$oldParams}p=2'>2</a>";
					$pageStr .="<a>...</a>";
					$start = $p-3;
					$end = $pages;

				}

				//显示所有页码
				for($i = $start;$i<=$end;$i++){
					if($i==$p){
						$pageStr .="<a href='?{$oldParams}p={$i}' class='active' >{$i}</a>";
					}else{
						$pageStr .="<a href='?{$oldParams}p={$i}'>{$i}</a>";
					}
				}

				//如果最后一个页面小于了总页数
				if($end < $pages){

					$pageStr .="<a>...</a>";
				}

				//判断是否显示末页和下一页
				if($p<$pages){
					$pageStr .="<a href='?{$oldParams}p=".($p+1)."' class='next'>下一页</a>";
					$pageStr .="<a href='?{$oldParams}p=".$pages."' class='last'>末页</a>";
					$pageStr .="<span>共<b>{$pages}</b>页到第</span>";
					$pageStr .="<form action='' style='display:inline-block;'><input type='text' class='num' value='{$p}' name='p' style='width:30px;'>";
					$pageStr .="<span>页</span>";
					$pageStr .="<input type='submit' value='确定'></form>";

				}

			}else{
				echo "当前没有记录...";
			}

			$pageStr .= "</div>";

			$info['pageStr'] = $pageStr;
			$info['limit'] = $limit;
			return  $info;

		}



	}


 ?>